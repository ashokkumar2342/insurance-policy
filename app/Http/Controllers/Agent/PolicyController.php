<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Model\Agent\Agent;
use App\Model\Agent\AgentLevel;
use App\Model\Agent\CommissionDetail;
use App\Model\Agent\PolicyDetail;
use App\Model\Agent\PremiumDetail;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Storage;
class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $policys= PolicyDetail::where('agent_id',getAgentId())->get();
        return view('student.policy.list',compact('policys'));
    } 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
         
        return view('student.policy.form');
    }

    
    
    public function store(Request $request)
    {   
         
        $rules=[
      "policy_registration_date" => 'required',
      
      
      "policy_holder_name" => 'required|max:199',
      
      "father_name" => 'required|max:199',
      
      "mobile" => 'required|numeric|digits:10',
      "email" => "required|max:199|email",
      "aadhaar_no" => 'required|numeric|digits:12',
      "pan_no" => 'required',
      
      "dob" => 'required|max:199',
       
      "c_address" => 'required|max:1000',
      "p_address" => 'required|max:1000',
      "gender" => "required|max:199",
      "state" => "required|max:199",
      
      "city" => "required|max:199",
      "pincode" => 'required|numeric|digits:6', 
      "picture" => 'required|mimes:jpeg,jpg,png|max:100', 
      "doc_pan_card" => 'required|mimes:pdf|max:1000', 
      "doc_aadhaar_card" => 'required|mimes:pdf|max:1000', 
      "doc_bank_details_card" => 'required|mimes:pdf|max:1000', 
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
        $username = str_random('10');
        $char = substr( str_shuffle( "abcdefghijklmnopqrstuvwxyz0123456789" ), 0, 6 );
        $policy= new PolicyDetail();
        $picture = $request->file('picture'); 
        $picture->store('agent/profile');
        $doc_pan_card = $request->file('doc_pan_card'); 
        $doc_pan_card->store('agent/profile');
        $doc_aadhaar_card = $request->file('doc_aadhaar_card'); 
        $doc_aadhaar_card->store('agent/profile');
        $doc_bank_details_card = $request->file('doc_bank_details_card'); 
        $doc_bank_details_card->store('agent/profile');
        $policy->picture = $picture->hashName();
        $policy->doc_pan_card = $doc_pan_card->hashName();
        $policy->doc_aadhaar_card = $doc_aadhaar_card->hashName();
        $policy->doc_bank_details_card = $doc_bank_details_card->hashName();
 
        $policy->agent_id = getAgentId(); 
        $policy->policy_registration_date= date('Y-m-d',strtotime($request->policy_registration_date)); 
        $policy->policy_holder_name= $request->policy_holder_name; 
        $policy->father_name= $request->father_name; 
        $policy->mother_name= $request->mother_name; 
        $policy->spouse_name= $request->spouse_name; 
        $policy->policy_name= $request->policy_name; 
        $policy->amount= $request->amount; 
        $policy->No_of_instalment= $request->No_of_instalment; 
        $policy->nominee_name= $request->nominee_name; 
        $policy->nominee_relation= $request->nominee_relation; 
        $policy->nominee_mobile= $request->nominee_mobile; 
        $policy->nominee_address= $request->nominee_address; 
        $policy->start_month_year= date('Y-m-d',strtotime($request->policy_registration_date));
        $policy->end_month_year= date('Y-m-d',strtotime($request->end_month_year));
        $policy->no_of_year= $request->no_of_year; 
        $policy->period= $request->period;  
        $policy->mobile= $request->mobile; 
        $policy->email= $request->email;
        $policy->pan_no= $request->pan_no;
        $policy->aadhaar_no= $request->aadhaar_no;
        $policy->dob= date('Y-m-d',strtotime($request->dob));
        $policy->gender= $request->gender; 
        $policy->c_address= $request->c_address;
        $policy->p_address= $request->p_address;
        $policy->state= $request->state;
        $policy->city= $request->city;
        $policy->pincode= $request->pincode;        
        if($policy->save()){            
          $this->commission($policy->id);  
          $this->premium($policy);  
             
            return response()->json(['status'=>1,'msg'=>'Policy Save Successfully']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }
    // Commission Of Agent
    public function premium($policy){
      
        try {
            $policy = PolicyDetail::find($policy->id);
             $policyPlan= 'half-yearly';        
             $no_of_instalment = $policy->no_of_instalment;
             $date = '2018-07-06';
             $dates = new Carbon($date);
             for ($i=1; $i <= $no_of_instalment; $i++) { 
               $premium = new PremiumDetail();
               $premium->policy_details_id = $policy->id;
               $premium->premium_amount = $policy->premium_amount;
               $premium->premium_month_year = $policy->premium_month_year;
                 if ('monthly'==$policyPlan) {             
                   $premium->due_date = $dates->addMonths($i);
                 }
                  if ('quarterly'==$policyPlan) {
                     $premium->due_date = $dates->addMonths($i*3);
                 }
                  if ('half-yearly'==$policyPlan) {
                      $premium->due_date = $dates->addMonths($i*6);
                 }
                  if ('yearly'==$policyPlan) {
                     $premium->due_date = $dates->addYears($i);
                 }
               
               $premium->commission = $policy->commission;
               $premium->reciept_date = $policy->reciept_date;
               $premium->reciept_no = $policy->reciept_no;
            
               $premium->save();

             }
            
        } catch (Exception $e) {
            Log::log('\premium', $e);
        }
        
    }

    public function commission($policy){
      $commission = new CommissionDetail();
      $agentLevels = AgentLevel::all();
      $agent1 = getAgentId();
      $agent2 = '';
      $agent3 = '';
      $agent4 = '';
      $agent5 = '';  
      $commission_amount= 100;
      $policy_id= $policy;
      foreach ($agentLevels as $key => $value) {
         if ($value->id==1) {  
           $commission = new CommissionDetail();          
           $commission->policy_details_id =$policy_id;
           $commission->agent_id =$agent1;                  
           $commission->per_month =date('Y-m-d');
           $commission->per_year =date('Y-m-d');
           $commission->commission_amount = $commission_amount * $value->percentage /100 ;
           $commission->level =1;
           $commission->save();

           $agent2 = Agent::find($agent1)->introducer_id;
         }
       
         if ($value->id==2) {
             if ($agent2==0) {
                break; 
              }
              else{
                $commission = new CommissionDetail();
                $commission->policy_details_id =$policy_id;
                $commission->agent_id =$agent2;                  
                $commission->per_month =date('Y-m-d');
                $commission->per_year =date('Y-m-d');
                $commission->commission_amount = $commission_amount * $value->percentage /100 ;
                $commission->level =2;
                $commission->save();
               $agent3 = Agent::find($agent2)->introducer_id;

              }              
         }
         if ($value->id==3) {
            if ($agent3==0) {
             break;
            }
            else{
                $commission = new CommissionDetail();
                $commission->policy_details_id =$policy_id;
                $commission->agent_id =$agent3;                  
                $commission->per_month =date('Y-m-d');
                $commission->per_year =date('Y-m-d');
                $commission->commission_amount = $commission_amount * $value->percentage /100 ;
                $commission->level =3;
                $commission->save();
               $agent4 = Agent::find($agent3)->introducer_id;

              }            
             
          }
         if ($value->id==4) {
           if ($agent4==0) {
              break;
            }
            else{
                $commission = new CommissionDetail();
                $commission->policy_details_id =$policy_id;
                $commission->agent_id =$agent4;                  
                $commission->per_month =date('Y-m-d');
                $commission->per_year =date('Y-m-d');
                $commission->commission_amount = $commission_amount * $value->percentage /100 ;
                $commission->level =4;
                $commission->save();
               $agent5 = Agent::find($agent4)->introducer_id;

              }          
         }
         if ($value->id==5) {
           if ($agent5==0) {
                break;
              }
              else{
                  $commission = new CommissionDetail();
                  $commission->policy_details_id =$policy_id;
                  $commission->agent_id =$agent5;                  
                  $commission->per_month =date('Y-m-d');
                  $commission->per_year =date('Y-m-d');
                  $commission->commission_amount = $commission_amount * $value->percentage /100 ;
                  $commission->level =5;
                  $commission->save();
                }
         }
          
          
      }
    }


    
   
 
   
}