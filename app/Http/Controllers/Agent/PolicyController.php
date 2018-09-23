<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Model\Agent\Agent;
use App\Model\Agent\PolicyDetail;
use Auth;
use Carbon;
use Illuminate\Http\Request;
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
        $students= PolicyDetail::all();
        return view('student.agent-details.list',compact('agent'));
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
        $agent= new PolicyDetail();
        $picture = $request->file('picture'); 
        $picture->store('agent/profile');
        $doc_pan_card = $request->file('doc_pan_card'); 
        $doc_pan_card->store('agent/profile');
        $doc_aadhaar_card = $request->file('doc_aadhaar_card'); 
        $doc_aadhaar_card->store('agent/profile');
        $doc_bank_details_card = $request->file('doc_bank_details_card'); 
        $doc_bank_details_card->store('agent/profile');
        $agent->picture = $picture->hashName();
        $agent->doc_pan_card = $doc_pan_card->hashName();
        $agent->doc_aadhaar_card = $doc_aadhaar_card->hashName();
        $agent->doc_bank_details_card = $doc_bank_details_card->hashName();
 
        $agent->agent_id = getAgentId(); 
        $agent->policy_registration_date= date('Y-m-d',strtotime($request->policy_registration_date)); 
        $agent->policy_holder_name= $request->policy_holder_name; 
        $agent->father_name= $request->father_name; 
        $agent->mother_name= $request->mother_name; 
        $agent->spouse_name= $request->spouse_name; 
        $agent->policy_name= $request->policy_name; 
        $agent->amount= $request->amount; 
        $agent->No_of_instalment= $request->No_of_instalment; 
        $agent->nominee_name= $request->nominee_name; 
        $agent->nominee_relation= $request->nominee_relation; 
        $agent->nominee_mobile= $request->nominee_mobile; 
        $agent->nominee_address= $request->nominee_address; 
        $agent->start_month_year= date('Y-m-d',strtotime($request->policy_registration_date));
        $agent->end_month_year= date('Y-m-d',strtotime($request->end_month_year));
        $agent->no_of_year= $request->no_of_year; 
        $agent->period= $request->period;  
        $agent->mobile= $request->mobile; 
        $agent->email= $request->email;
        $agent->pan_no= $request->pan_no;
        $agent->aadhaar_no= $request->aadhaar_no;
        $agent->dob= date('Y-m-d',strtotime($request->dob));
        $agent->gender= $request->gender; 
        $agent->c_address= $request->c_address;
        $agent->p_address= $request->p_address;
        $agent->state= $request->state;
        $agent->city= $request->city;
        $agent->pincode= $request->pincode;        
        if($agent->save()){            
            
             
            return response()->json(['status'=>1,'msg'=>'Policy Save Successfully']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }

    
   
 
   
}