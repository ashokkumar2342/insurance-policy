<?php

namespace App\Http\Controllers\Admin;

use App\Student;
use App\Model\StudentFee;
use App\Model\ClassType;
use App\Model\PaymentType;
use App\Model\SessionDate;
use App\Model\DiscountType; 
use Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Excel;
use DB;
use Carbon;
use Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students= Student::all();
        return view('admin.student.studentdetails.list',compact('students'));
    }
    
     

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
        
        $classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');    
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');    
        return view('admin.student.studentdetails.add',compact('classes','sessions'));
    }

    public function  passwordReset(Student $student){
        $char = substr( str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789"), 0, 6 );
        $student->password = bcrypt($char);
        $student->tmp_pass = $char;
        if($student->save()){ 
             //Event::fire('');
            return redirect()->back()->with(['class'=>'success','message'=>'student Password reset success ...']);
           
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }
    public function payFee(Request $request){
        $this->validate($request,[
            'total_fees' => 'required|numeric',
            'discount_type_id' => 'required|numeric',
            'installment_fees'=> 'required|numeric',
            'discount' => 'required|numeric',
            'discount_name' => 'required|max:199',
            'receipt_no' => 'required|max:199',
            "receipt_date" => 'required|date',
            "amount_payable" => 'required|numeric',
            'received_fees'=> 'required|numeric',
            "cheque_no" => 'nullable|numeric',
            "other_fee" => 'nullable|numeric',
            "bank_name" => 'nullable|max:199',
            "cheque_date" => 'nullable|date',      
        ]);
        
        $studentFee = new StudentFee();
        $studentFee->student_id = $request->student_id;
        $studentFee->total_fees = $request->total_fees;
        $studentFee->other_fee = $request->other_fee;
        $studentFee->discount_type_id = $request->discount_type_id;
        $studentFee->discount_name = $request->discount_name;
        $studentFee->discount = $request->discount;
        $studentFee->receipt_no = $request->receipt_no;
        $studentFee->receipt_date = $request->receipt_date;
        $studentFee->amount_payable = $request->amount_payable;
        $studentFee->cheque_no = $request->cheque_no;
        $studentFee->bank_name = $request->bank_name;
        $studentFee->cheque_date = $request->cheque_date;
        $studentFee->received_fee = $request->received_fees;
        $studentFee->balance_fee = $request->amount_payable-$request->received_fees;
        $studentFee->installment_fees = $request->installment_fees;
        
        $studentFee->admission_fee =$request->admission_fees ;
        $studentFee->registration_fee =$request->registration_fees ;
        $studentFee->annual_charge =$request->annual_charges ;
        $studentFee->caution_money =$request->caution_money ;
        
        $studentFee->activity_charge =$request->activity_charges ;
        $studentFee->smart_class_fee =$request->smart_class_fees ;
        $studentFee->sms_charge =$request->sms_charges;
        $studentFee->tution_fee = $request->tution_fees;
        $studentFee->transport_fee= $request->transport_fee;
        if($studentFee->save()){ 
            return redirect()->back()->with(['class'=>'success','message'=>'student fee pay success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);

    }
    
   public function studentFeeEdit(Request $request, StudentFee $studentFee){
        return view('admin.student.fee.edit',compact('studentFee'));
    }

    public function studentFeeUpdate(Request $request,StudentFee $studentFee, Student $student){
         
      
        $studentFee->student_id = $request->student_id;
        $studentFee->total_fees = $request->total_fees;
        $studentFee->installment_fees = $request->installment_fees;
        $studentFee->discount_type_id = $request->discount_type_id;
        $studentFee->discount_name = $request->discount_name;
        $studentFee->discount = $request->discount;
        $studentFee->receipt_no = $request->receipt_no;
        $studentFee->receipt_date = $request->receipt_date;
        $studentFee->other_fee = $request->other_fee;        
        $studentFee->amount_payable = $request->amount_payable;        
        $studentFee->received_fee = $request->received_fees;

        $studentFee->cheque_no = $request->cheque_no;
        $studentFee->bank_name = $request->bank_name;
        $studentFee->cheque_date = $request->cheque_date;
        $studentFee->balance_fee = $request->amount_payable-$request->received_fees;
        // return $studentFee; 
         if($studentFee->save()){ 
           return redirect()->back()->with(['class'=>'success','message'=>'student fee update success ...']);
           
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
       
        $this->validate($request,[ 
            'class' => 'required|numeric',
            "section" => 'required|numeric',
            "registration_no" => 'required|max:199',
            "admission_no" => 'max:199',
            "roll_no" => 'max:199',
            "date_of_admission" => 'required|date',
            "date_of_leaving" => 'required|date',
            "date_of_activation" => 'required|date',
            "student_name" => 'required|max:199',
            "nick_name" => 'required|max:199',
            "father_name" => 'required|max:199',
            "mother_name" => 'required|max:199',
            "father_mobile" => 'required|numeric',
            "mother_mobile" => 'required|numeric',
            "date_of_birth" => 'required|max:199',
            "religion" => "required|max:199",
            "category" => "required|max:199",
            "c_address" => 'required|max:1000',
            "p_address" => 'required|max:1000',
            "state" => "required|max:199",
            "email" => "required|max:199|email",
            "city" => "required|max:199",
            "pincode" => 'required|numeric',
                      
      
        ]);   
         
        $admin_id = Auth::guard('admin')->user()->id;
        $username = str_random('10');
        $char = substr( str_shuffle( "abcdefghijklmnopqrstuvwxyz0123456789" ), 0, 6 );
        $student= new Student();
        $student->username= $username;    
        $student->password = bcrypt($char);
        $student->tem_pass = $char; 
        $student->admin_id = $admin_id;                               
        $student->session_id= 1;
        $student->class_id= $request->class;
        $student->section_id= $request->section;     
        $student->registration_no= $request->registration_no;     
        $student->admission_no= $request->admission_no;     
        $student->roll_no= $request->roll_no;     
        $student->date_of_admission= date('Y-m-d',strtotime($request->date_of_admission));
        $student->date_of_leaving= date('Y-m-d',strtotime($request->date_of_leaving));
        $student->date_of_activation= date('Y-m-d',strtotime($request->date_of_activation));
        $student->name= $request->student_name;
        $student->nick_name= $request->nick_name;
        $student->father_name= $request->father_name;
        $student->mother_name= $request->mother_name; 
        $student->father_mobile= $request->father_mobile;
        $student->mother_mobile= $request->mother_mobile;
        $student->email= $request->email;
        $student->dob= date('Y-m-d',strtotime($request->date_of_birth));
        $student->gender= $request->gender;
        $student->religion= $request->religion;
        $student->category= $request->category;
        $student->c_address= $request->c_address;
        $student->p_address= $request->p_address;
        $student->state= $request->state;
        $student->city= $request->city;
        $student->pincode= $request->pincode;        
        if($student->save()){            
            $student->username= 'ISKOOL10'.$student->id;
            $student->save();
            return redirect()->route('admin.student.view',$student->id)->with(['class'=>'success','message'=>'Student Registration Success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StudentDetails  $studentDetails
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('admin.student.studentdetails.view',compact('student'));
    }
    public function excelData(){

        $students = Student::orderBy('center_id','session_id','class_id','section_id')->get();
        foreach($students as $student){
            $data[] =['id'=>$student->username,'name'=>$student->name,'center'=>$student->centers->name,'class'=>$student->classes->name,'section'=>$student->sections->name,'date of admission'=>Carbon\Carbon::parse( $student->date_of_admission)->format('d-m-Y'),'father name'=>$student->father_name,'mother name'=>$student->mother_name,'date of birthday'=>Carbon\Carbon::parse( $student->dob)->format('d-m-Y'),'religion'=>$student->religion,'category'=>$student->category,'address'=>$student->address,'state'=>$student->state,'city'=>$student->city,'pincode'=>$student->pincode,'mobile one'=>$student->mobile_one,'mobile two'=>$student->mobile_two,'mobile sms'=>$student->mobile_sms];
        }
        Excel::create('studentlist', function($excel) use ($data) {
            $excel->sheet('sheet', function($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->export('xls');

    }
    public function image($image){
        $img = Storage::disk('student')->get('profile/'.$image);
        return response($img);
    }
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

        //     return redirect()->route('admin.student.view',$student->id)->with(['class'=>'success','message'=>'student registration success ...']);
        // }
        // return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentDetails  $studentDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $centers = Center::where('status',1)->get();
        $paymenttypes = array_pluck(PaymentType::get(['id','name'])->toArray(),'name', 'id');
        $classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');
        $discounts = array_pluck(DiscountType::get(['id','name'])->toArray(),'name', 'id');
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        $routes = array_pluck(TransportRoute::get(['id','name'])->toArray(),'name', 'id');
        return view('admin.student.studentdetails.edit',compact('student','classes','sessions','centers','paymenttypes','discounts','routes'));
    }

     public function profileedit(Student $student)
    {
        $centers = Center::where('status',1)->get();
        $paymenttypes = array_pluck(PaymentType::get(['id','name'])->toArray(),'name', 'id');
        $classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');
        $discounts = array_pluck(DiscountType::get(['id','name'])->toArray(),'name', 'id');
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        $routes = array_pluck(TransportRoute::get(['id','name'])->toArray(),'name', 'id');
        return view('admin.student.studentdetails.profileedit',compact('student','classes','sessions','centers','paymenttypes','discounts','routes'));
    }

      public function totalfeeedit(Student $student)
    {
        $centers = Center::where('status',1)->get();
        $paymenttypes = array_pluck(PaymentType::get(['id','name'])->toArray(),'name', 'id');
        $classes = array_pluck(ClassType::get(['id','alias'])->toArray(),'alias', 'id');
        $discounts = array_pluck(DiscountType::get(['id','name'])->toArray(),'name', 'id');
        $sessions = array_pluck(SessionDate::get(['id','date'])->toArray(),'date', 'id');
        $routes = array_pluck(TransportRoute::get(['id','name'])->toArray(),'name', 'id');
        return view('admin.student.studentdetails.totalfeeedit',compact('student','classes','sessions','centers','paymenttypes','discounts','routes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudentDetails  $studentDetails
     * @return \Illuminate\Http\Response
     */
    public function totalfeeupdate(Request $request, Student $student)
    {
        $this->validate($request,[
            'center' => 'required|numeric',

            'session' => 'required|numeric',
            'class' => 'required|numeric',
            "section" => 'required|numeric',           
            "student_name" => 'required|max:199',            
            
            'payment_type' => 'required|numeric'
      
        ]);
        $transport_fee = ($request->driver_id)?$request->transport_fees:0;
        $transport_fee2 = (!$request->driver_id)?$request->transport_fees:0;
        
        

        $student->center_id= $request->center;
        $student->session_id= $request->session;
        $student->class_id= $request->class;
        $student->section_id= $request->section;
        $student->totalFee= $request->total_fee-$transport_fee2;
        $student->firsttime_fee = ($request->admission_fees+$request->registration_fees+$request->annual_charges+$request->caution_money) ;
        $student->installment_fee = ($request->activity_charges+$request->smart_class_fees+$request->sms_charges+$request->tution_fees+$transport_fee);
        
        $student->admission_fee =$request->admission_fees ;
        $student->registration_fee =$request->registration_fees ;
        $student->annual_charge =$request->annual_charges ;
        $student->caution_money =$request->caution_money ;
        
        $student->activity_charge =$request->activity_charges ;
        $student->smart_class_fee =$request->smart_class_fees ;
        $student->sms_charge =$request->sms_charges;
        $student->tution_fee = $request->tution_fees;
        $student->transport_fee= $transport_fee;
        
        
        $student->name= $request->student_name;
        
        $student->discount_type_id= $request->discount_type;
        $student->payment_type_id= $request->payment_type;
       
        
        if($student->save()){ 
            return redirect()->route('admin.student.view',$student->id)->with(['class'=>'success','message'=>'student fee update success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }

      public function update(Request $request, Student $student)
    {
        $this->validate($request,[
            'center' => 'required|numeric',

            'session' => 'required|numeric',
            'class' => 'required|numeric',
            "section" => 'required|numeric',
            "date_of_admission" => 'required|date',
            "student_name" => 'required|max:199',
            "father_name" => 'required|max:199',
            "mother_name" => 'required|max:199',
            "date_of_birth" => 'required|max:199',
            "religion" => "required|max:199",
            "category" => "required|max:199",
            "address" => 'required|max:1000',
            "state" => "required|max:199",
            "city" => "required|max:199",
            "pincode" => 'required|numeric',
            "mobile_one" => 'nullable|numeric',
            "mobile_two" => 'nullable|numeric',
            "mobile_sms" => 'required|numeric',
            'payment_type' => 'required|numeric'
      
        ]);
        $transport_fee = ($request->driver_id)?$request->transport_fees:0;
        $transport_fee2 = (!$request->driver_id)?$request->transport_fees:0;
        
        

        $student->center_id= $request->center;
        $student->session_id= $request->session;
        $student->class_id= $request->class;
        $student->section_id= $request->section;
        $student->totalFee= $request->total_fee-$transport_fee2;
        $student->firsttime_fee = ($request->admission_fees+$request->registration_fees+$request->annual_charges+$request->caution_money) ;
        $student->installment_fee = ($request->activity_charges+$request->smart_class_fees+$request->sms_charges+$request->tution_fees+$transport_fee);
        
        $student->admission_fee =$request->admission_fees ;
        $student->registration_fee =$request->registration_fees ;
        $student->annual_charge =$request->annual_charges ;
        $student->caution_money =$request->caution_money ;
        
        $student->activity_charge =$request->activity_charges ;
        $student->smart_class_fee =$request->smart_class_fees ;
        $student->sms_charge =$request->sms_charges;
        $student->tution_fee = $request->tution_fees;
        $student->transport_fee= $transport_fee;
        
        $student->date_of_admission= date('Y-m-d',strtotime($request->date_of_admission));
        $student->name= $request->student_name;
        $student->father_name= $request->father_name;
        $student->mother_name= $request->mother_name;
        $student->dob= date('Y-m-d',strtotime($request->date_of_birth));
        $student->religion= $request->religion;
        $student->category= $request->category;
        $student->address= $request->address;
        $student->state= $request->state;
        $student->city= $request->city;
        $student->pincode= $request->pincode;
        $student->mobile_one= $request->mobile_one;
        $student->mobile_two= $request->mobile_two;
        $student->mobile_sms= $request->mobile_sms;
        $student->discount_type_id= $request->discount_type;
        $student->payment_type_id= $request->payment_type;
        $student->transport_id = $request->driver_id;
        $student->route_id = $request->route;
        if($student->save()){ 
            return redirect()->route('admin.student.view',$student->id)->with(['class'=>'success','message'=>'student update success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }

        public function profileupdate(Request $request, Student $student)
    {
        $this->validate($request,[
            'center' => 'required|numeric',

            'session' => 'required|numeric',
            'class' => 'required|numeric',
            "section" => 'required|numeric',
            "date_of_admission" => 'required|date',
            "student_name" => 'required|max:199',
            "father_name" => 'required|max:199',
            "mother_name" => 'required|max:199',
            "date_of_birth" => 'required|max:199',
            "religion" => "required|max:199",
            "category" => "required|max:199",
            "address" => 'required|max:1000',
            "state" => "required|max:199",
            "city" => "required|max:199",
            "pincode" => 'required|numeric',
            "mobile_one" => 'nullable|numeric',
            "mobile_two" => 'nullable|numeric',
            "mobile_sms" => 'required|numeric',
            
      
        ]);
       
        $student->center_id= $request->center;
        $student->session_id= $request->session;
        $student->class_id= $request->class;
        $student->section_id= $request->section;
        $student->date_of_admission= date('Y-m-d',strtotime($request->date_of_admission));
        $student->name= $request->student_name;
        $student->father_name= $request->father_name;
        $student->mother_name= $request->mother_name;
        $student->dob= date('Y-m-d',strtotime($request->date_of_birth));
        $student->religion= $request->religion;
        $student->category= $request->category;
        $student->address= $request->address;
        $student->state= $request->state;
        $student->city= $request->city;
        $student->pincode= $request->pincode;
        $student->mobile_one= $request->mobile_one;
        $student->mobile_two= $request->mobile_two;
        $student->mobile_sms= $request->mobile_sms;
     
        if($student->save()){ 
            return redirect()->route('admin.student.view',$student->id)->with(['class'=>'success','message'=>'student profile update success ...']);
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }
    public function importStudent(Request $request){
        $path = 'images/excel.xls';
        //  $file = $request->file('student');
        // $file->store('student/excel');
        
        //$data = \Excel::load($path)->get();
        $data = Excel::load($path)->get();
 			//dd($data[0]->items);
 			// foreach ($data as $key) {
    //               $rec[] = ['id'=>$value->id,'name'=>'','email'=>'','username'=>'','password'=>'',''=>'tmp_pass',''=>'','center_id'=>'','section_id'=>'','clas_id'=>'','totalFee'=>'','installment_fee'=>'','firsttime_fee'=>'','transport_id'=>'','route_id'=>'','date_of_admission'=>'','father_name'=>'','mother_name'=>'','date_of_birth'=>'','religion'=>'','category'=>'','address'=>'','state'=>'','city'=>'',''=>'','pincode'=>'','mobile_one'=>'','mobile_two'=>'',''=>'','mobile_sms'=>'','otp'=>'','picture'=>'','discount_type_id'=>'','payment_type_id'=>'','admission_fee'=>'','registration_fee'=>'','annual_charge'=>'','caution_money'=>'','activity_charge'=>'',''=>'',''=>'',''=>'',''=>'',''=>'',''=>'',];
    //             }
    foreach ($data as $key=>$value){
        $collection = collect($value);
        $rec = $collection->toArray();
        DB::table('students')->insert($rec);
    }
    
        // Excel::load($request->file('student')->ori, function($reader) {

        //     // reader methods
        
        // });
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudentDetails  $studentDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {  
       
        if ($student->delete()) {
            
         return redirect()->back()->with(['class'=>'success','message'=>'student delete success ...']);
           
        }
        return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
    }
    public function feeReceipt(StudentFee $studentFee)
    {
        return view('admin.student.studentdetails.feeReceipt',compact('studentFee'));
    }
   
}