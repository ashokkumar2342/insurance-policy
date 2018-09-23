@extends('admin.layout.base')
@push('links')
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@section('body')
<section class="content-header">
    <h1> Agent Registration<small>Form</small> </h1>
      <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>        
      </ol>
</section>
    <section class="content">        
        {{Form::close()}}
      	<div class="box">        
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12 ">                  
                        {{ Form::open(['route'=>'admin.agent.post','class'=>'add_form']) }} 
                        {{-- <form class="add_from" action="{{ route('admin.agent.post') }}">   --}}
                         <div class="row">{{--row start --}}
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <div class="col-md-12">
                                         <div class="col-lg-3">                         
                                            <div class="form-group">
                                                {{ Form::label('name','Agent Name',['class'=>' control-label']) }}                         
                                                {{ Form::text('name','',['class'=>'form-control',' required']) }}
                                                <p class="text-danger">{{ $errors->first('name') }}</p>
                                            </div>
                                        </div>  
                                      
                                         <div class="col-lg-3">                         
                                            <div class="form-group">
                                                {{ Form::label('father_name','Father Name',['class'=>' control-label']) }}                         
                                                {{ Form::text('father_name','',['class'=>'form-control',' required']) }}
                                                <p class="text-danger">{{ $errors->first('father_name') }}</p>
                                            </div>
                                        </div>
                                         
                                         
                                         <div class="col-lg-3">                         
                                            <div class="form-group">
                                                {{ Form::label('mobile','Mobile Number',['class'=>' control-label']) }}                         
                                                {{ Form::text('mobile','',['class'=>'form-control ',' required']) }}
                                                <p class="text-danger">{{ $errors->first('mother_mobile') }}</p>
                                            </div>
                                        </div>
                                         <div class="col-lg-3">                         
                                            <div class="form-group">
                                                {{ Form::label('email','Email Id',['class'=>' control-label']) }}
                                                {{ Form::text('email','',['class'=>'form-control','required']) }}
                                                <p class="text-danger">{{ $errors->first('email') }}</p>
                                            </div>
                                        </div>  
                                         <div class="col-lg-3">                         
                                            <div class="form-group">
                                                {{ Form::label('dob','Date of Birth',['class'=>' control-label']) }}      
                                                <div class="input-group">
                                                  <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                  </div>                   
                                                    {{ Form::text('dob','',['class'=>'form-control datepicker','required']) }}
                                                </div>
                                               
                                                <p class="text-danger">{{ $errors->first('dob') }}</p>
                                            </div>
                                        </div> 
                                        <div class="col-lg-3">                         
                                            <div class="form-group">
                                                {{ Form::label('registration_date','Registration Date',['class'=>' control-label']) }}      
                                                <div class="input-group">
                                                  <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                  </div>                   
                                                    {{ Form::text('registration_date','',['class'=>'form-control datepicker','required']) }}
                                                </div>
                                               
                                                <p class="text-danger">{{ $errors->first('registration_date') }}</p>
                                            </div>
                                        </div> 
                                      <div class="col-lg-3">                         
                                            <div class="form-group">
                                                {{ Form::label('aadhaar_no','Aadhaar No',['class'=>' control-label ']) }}                         
                                                {{ Form::text('aadhaar_no','',['class'=>'form-control',' required']) }}
                                                <p class="text-danger">{{ $errors->first('aadhaar_no') }}</p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">                         
                                            <div class="form-group">
                                                {{ Form::label('pan_no','Pan No',['class'=>' control-label ']) }}                         
                                                {{ Form::text('pan_no','',['class'=>'form-control',' required']) }}
                                                <p class="text-danger">{{ $errors->first('pan_no') }}</p>
                                            </div>
                                        </div>
                                     
                                    </div>
                                </div>
                            </div>
                        </div>{{--row end --}}  
                         <div class="row">{{--row start --}}
                             <div class="col-md-12 ">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                           
                                             <div class="col-lg-6">                         
                                                <div class="form-group">
                                                    {{ Form::label('p_address','Permanent Address',['class'=>'control-label']) }}
                                                     {{ Form::textarea('p_address','',['class'=>'form-control','rows'=>1  ,'style'=>'resize:none']) }}
                                                     <p class="text-danger">{{ $errors->first('p_address') }}</p>
                                                </div>
                                            </div>
                                             <div class="col-lg-6">                         
                                                <div class="form-group">
                                                    {{ Form::label('c_address',' Correspondence Address',['class'=>'control-label']) }}
                                                     {{ Form::textarea('c_address','',['class'=>'form-control','rows'=>1  ,'style'=>'resize:none']) }}
                                                     <p class="text-danger">{{ $errors->first('c_address') }}</p>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div> {{--row end --}}
                        <div class="row">{{--row start --}}
                             <div class="col-md-12 ">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                                  <div class="col-lg-3">                         
                                            <div class="form-group">
                                                {{ Form::label('gender','Gender',['class'=>' control-label']) }}
                                                {!! Form::select('gender',
                                                [
                                                   'Male' => 'Male',
                                                   'Femele' => 'Femele',
                                                   
                                                ]
                                                , null, ['class'=>'form-control','placeholder'=>'Select Gender','required']) !!}
                                                <p class="text-danger">{{ $errors->first('gender') }}</p>
                                            </div>
                                        </div>                                       
                                         <div class="col-lg-3">                         
                                             <div class="form-group">
                                                 {{ Form::label('city','City',['class'=>' control-label']) }}
                                                 {!! Form::text('city','', ['class'=>'form-control','required']) !!}
                                                 <p class="text-danger">{{ $errors->first('city') }}</p>
                                             </div>
                                         </div>
                                         <div class="col-lg-3">                         
                                            <div class="form-group">
                                                {{ Form::label('state','State',['class'=>' control-label']) }}
                                                {!! Form::text('state', '', ['class'=>'form-control','required']) !!}
                                                <p class="text-danger">{{ $errors->first('state') }}</p>
                                            </div>
                                        </div>
                                         <div class="col-lg-3">                         
                                            <div class="form-group">
                                                {{ Form::label('pincode','Pincode',['class'=>' control-label']) }}                         
                                                {{ Form::text('pincode','',array('class' => 'form-control' )) }}
                                                <p class="text-danger">{{ $errors->first('pincode') }}</p>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div> {{--row end --}} 
                            <div class="row">{{--row start --}}
                                <div class="col-md-12 ">
                                       <div class="form-group">
                                           <div class="col-md-12">
                                               <div class="col-lg-3">                         
                                                  <div class="form-group">
                                                      {{ Form::label('bank_name','Bank Name',['class'=>' control-label']) }}                         
                                                      {{ Form::text('bank_name','',array('class' => 'form-control' )) }}
                                                      <p class="text-danger">{{ $errors->first('bank_name') }}</p>
                                                  </div>
                                              </div> 
                                               <div class="col-lg-3">                         
                                                  <div class="form-group">
                                                      {{ Form::label('ifsc_code','IFSC Code',['class'=>' control-label']) }}                         
                                                      {{ Form::text('ifsc_code','',array('class' => 'form-control' )) }}
                                                      <p class="text-danger">{{ $errors->first('ifsc_code') }}</p>
                                                  </div>
                                              </div>
                                               <div class="col-lg-3">                         
                                                  <div class="form-group">
                                                      {{ Form::label('account_no','Account No',['class'=>' control-label']) }}                         
                                                      {{ Form::text('account_no','',array('class' => 'form-control' )) }}
                                                      <p class="text-danger">{{ $errors->first('account_no') }}</p>
                                                  </div>
                                              </div>
                                               <div class="col-lg-3">                         
                                                  <div class="form-group">
                                                      {{ Form::label('account_holder_name','Account Holder Name',['class'=>' control-label']) }}                         
                                                      {{ Form::text('account_holder_name','',array('class' => 'form-control' )) }}
                                                      <p class="text-danger">{{ $errors->first('account_holder_name') }}</p>
                                                  </div>
                                              </div> 
                                               <div class="col-lg-3">                         
                                                  <div class="form-group">
                                                      {{ Form::label('picture','Photo',['class'=>' control-label']) }}                         
                                                      {{ Form::file('picture','',array('class' => 'form-control' )) }}
                                                      <p class="text-danger">{{ $errors->first('picture') }}</p>
                                                  </div>
                                                </div>
                                                <div class="col-lg-3">                         
                                                   <div class="form-group">
                                                       {{ Form::label('doc_pan_card','Pan Card',['class'=>' control-label']) }}                         
                                                       {{ Form::file('doc_pan_card','',array('class' => 'form-control' )) }}
                                                       <p class="text-danger">{{ $errors->first('doc_pan_card') }}</p>
                                                   </div>
                                                 </div>
                                                 <div class="col-lg-3">                         
                                                    <div class="form-group">
                                                        {{ Form::label('doc_aadhaar_card',' Aadhaar Card',['class'=>' control-label']) }}                         
                                                        {{ Form::file('doc_aadhaar_card','',array('class' => 'form-control' )) }}
                                                        <p class="text-danger">{{ $errors->first('doc_aadhaar_card') }}</p>
                                                    </div>
                                                  </div>
                                                  <div class="col-lg-3">                         
                                                     <div class="form-group">
                                                         {{ Form::label('doc_bank_details_card','Bank details',['class'=>' control-label']) }}                         
                                                         {{ Form::file('doc_bank_details_card','',array('class' => 'form-control' )) }}
                                                         <p class="text-danger">{{ $errors->first('doc_bank_details_card') }}</p>
                                                     </div>
                                                   </div> 
                                           </div>
                                       </div>
                                   </div>
                               </div> {{--row end --}}                 
                             
                        
                             <div class="row">
                        <div class="col-md-12 text-center">
                            <button class="btn btn-success">Submit</button>
                        </div>
                    </div>
                            
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
 @push('scripts')
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script type="text/javascript">
    $( ".datepicker" ).datepicker({dateFormat:'dd-mm-yy'});
 
     
</script>

@endpush