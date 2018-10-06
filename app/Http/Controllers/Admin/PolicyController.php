<?php

namespace App\Http\Controllers\Admin;

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
        
        return view('admin.policy.show');
    } 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     

    public function daterange(Request $request)
    {
         
        $date  = explode('-',$request->daterange);// dateRange is you string
        $dateFrom = date( 'Y-m-d', strtotime($date[0]));
        $dateTo = date( 'Y-m-d', strtotime($date[1])); 

        $policy = PolicyDetail::orWhereBetween('created_at', [$dateFrom, $dateTo])
                                
                                ->OrWhere('policy_no',$request->policy_no)                              
                                ->where('status',1)
                                ->get();
        $response['data'] = view('admin.policy.daterange_result',compact('policy'))->render();
        $response['status'] = 1; 
         
        return response()->json($response);
         
       // return view('admin.finance.cashbook.print',compact('cashbook'));
    }

    
    
     
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudentDetails  $studentDetails
     * @return \Illuminate\Http\Response
     */
   
 
   
}