<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Model\Agent\Agent;
use Auth;
use Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Storage;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students= Agent::all();
        return view('student.agent-details.list',compact('agent'));
    } 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
         
        return view('student.agent-details.add');
    }

    
    
    public function store(Request $request)
    {   
         
        $rules=[
      "registration_date" => 'required',
      
      
      "name" => 'required|max:199',
      
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
        $agent= new Agent();
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
        $agent->username= $username;    
        $agent->password = bcrypt($char);        
        $agent->introducer_id = getAgentId(); 
        $agent->registration_date= date('Y-m-d',strtotime($request->registration_date)); 
        $agent->name= $request->name; 
        $agent->father_name= $request->father_name; 
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
        $agent->ifsc_code= $request->ifsc_code;        
        $agent->bank_name= $request->bank_name;        
        $agent->account_no= $request->account_no;        
        $agent->account_holder_name= $request->account_holder_name;      
        $agent->status= 0;      
        if($agent->save()){            
            $agent->username= 'ISKOOL10'.$agent->id;
            $agent->save();
            return response()->json(['status'=>1,'msg'=>'Agent Registration Successfully']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StudentDetails  $studentDetails
     * @return \Illuminate\Http\Response
     */
    
    public function imageUpdate(Request $request, Student $student){

        $data = $request->image;       

        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);
        $data = base64_decode($data);
        $image_name= time().'.png';       
        $path = Storage_path() . "/app/student/profile/" . $image_name;       
        file_put_contents($path, $data); 
        $student->picture = $image_name;
        $student->save();
        return response()->json(['success'=>'done']);
    
        
        // $file = $request->file('image');

        // $file->store('student/profile');
        // $student->picture = $file->hashName();
        // if($student->save()){  
        // return response()->json(['success'=>'done']);

        //     return redirect()->route('student.view',$student->id)->with(['class'=>'success','message'=>'student registration success ...']);
        // }
        // return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentDetails  $studentDetails
     * @return \Illuminate\Http\Response
     */
   
 
   
}