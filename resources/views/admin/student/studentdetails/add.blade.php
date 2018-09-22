@extends('admin.layout.base')
@push('links')
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@section('body')
<section class="content-header">
    <h1> Student Add <small>Details</small> </h1>
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
                        {{ Form::open(['route'=>'admin.student.post']) }}                            
                             <div class="row">{{--row start --}}
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <div class="col-md-12">                                          
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('class','Class',['class'=>' control-label']) }}
                                                    {!! Form::select('class',$classes, null, ['class'=>'form-control','placeholder'=>'Select Class','required']) !!}
                                                    <p class="text-danger">{{ $errors->first('session') }}</p>
                                                </div>
                                            </div>
                                                <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('section','Section',['class'=>' control-label']) }}
                                                    {!! Form::select('section',[]
                                                    , null, ['class'=>'form-control','placeholder'=>'Select Section','required']) !!}
                                                    <p class="text-danger">{{ $errors->first('session') }}</p>
                                                </div>
                                            </div>
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('registration_no','Registration no',['class'=>' control-label ']) }}                         
                                                    {{ Form::text('registration_no','',['class'=>'form-control',' required']) }}
                                                    <p class="text-danger">{{ $errors->first('registration_no') }}</p>
                                                </div>
                                            </div>
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('admission_no','Admission No',['class'=>' control-label']) }}
                                                    {{ Form::text('admission_no','',['class'=>'form-control',' required']) }}
                                                    <p class="text-danger">{{ $errors->first('admission_no') }}</p>
                                                </div>
                                            </div>
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('roll_no','Roll No',['class'=>' control-label']) }}
                                                    {{ Form::text('roll_no','',['class'=>'form-control',' required']) }}
                                                    <p class="text-danger">{{ $errors->first('roll_no') }}</p>
                                                </div>
                                            </div> 
                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('date_of_admission','Date of Admission',['class'=>' control-label']) }}   
                                                    <div class="input-group">
                                                      <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                      </div>                          
                                                    {{ Form::text('date_of_admission','',array('class' => 'form-control datepicker',' required' )) }}
                                                    </div>
                                                    <p class="text-danger">{{ $errors->first('date_of_admission') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('date_of_leaving','Date of Leaving',['class'=>' control-label']) }}   
                                                    <div class="input-group">
                                                      <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                      </div>                          
                                                    {{ Form::text('date_of_leaving','',array('class' => 'form-control datepicker' ,' required')) }}
                                                    </div>
                                                    <p class="text-danger">{{ $errors->first('date_of_leaving') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('date_of_activation','Date of Activation',['class'=>' control-label']) }}   
                                                    <div class="input-group">
                                                      <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                      </div>                          
                                                    {{ Form::text('date_of_activation','',array('class' => 'form-control datepicker',' required' )) }}
                                                    </div>
                                                    <p class="text-danger">{{ $errors->first('date_of_activation') }}</p>
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
                                                    {{ Form::label('student_name','Student Name',['class'=>' control-label']) }}                         
                                                    {{ Form::text('student_name','',['class'=>'form-control',' required']) }}
                                                    <p class="text-danger">{{ $errors->first('student_name') }}</p>
                                                </div>
                                            </div>  
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('nick_name','Nick Name',['class'=>' control-label']) }}                         
                                                    {{ Form::text('nick_name','',['class'=>'form-control']) }}
                                                    <p class="text-danger">{{ $errors->first('nick_name') }}</p>
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
                                                    {{ Form::label('mother_name','Mother Name',['class'=>' control-label']) }}                         
                                                    {{ Form::text('mother_name','',['class'=>'form-control ',' required']) }}
                                                    <p class="text-danger">{{ $errors->first('mother_name') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('father_mobile','Father Mobile Number',['class'=>' control-label']) }}                         
                                                    {{ Form::text('father_mobile','',['class'=>'form-control ',' required']) }}
                                                    <p class="text-danger">{{ $errors->first('father_mobile') }}</p>
                                                     
                                                </div>
                                            </div>
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('mother_mobile','Mother Mobile Number',['class'=>' control-label']) }}                         
                                                    {{ Form::text('mother_mobile','',['class'=>'form-control ',' required']) }}
                                                    <p class="text-danger">{{ $errors->first('mother_mobile') }}</p>
                                                </div>
                                            </div>
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('email','Email Id',['class'=>' control-label']) }}
                                                    {{ Form::text('email','',['class'=>'form-control']) }}
                                                    <p class="text-danger">{{ $errors->first('email') }}</p>
                                                </div>
                                            </div>  
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('date_of_birth','Date of Birth',['class'=>' control-label']) }}      
                                                    <div class="input-group">
                                                      <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                      </div>                   
                                                        {{ Form::text('date_of_birth','',['class'=>'form-control datepicker','required']) }}
                                                    </div>
                                                   
                                                    <p class="text-danger">{{ $errors->first('date_of_birth') }}</p>
                                                </div>
                                            </div> 
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
                                                    {{ Form::label('religion','Religion',['class'=>' control-label']) }}
                                                    {!! Form::select('religion',
                                                    [
                                                       'Hindu' => 'Hindu',
                                                       'Muslim' => 'Muslim',
                                                       'Sikh' => 'Sikh', 
                                                       'Christian' => 'Christian',
                                                       'Other' => 'other',
                                                    ]
                                                    , null, ['class'=>'form-control','placeholder'=>'Select Religion','required']) !!}
                                                    <p class="text-danger">{{ $errors->first('religion') }}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('category','Category',['class'=>' control-label']) }}
                                                    {!! Form::select('category',
                                                    [
                                                       'General' => 'General',
                                                       'OBC' => 'OBC',
                                                       'SC' => 'SC',
                                                       'ST' => 'ST',
                                                    ]
                                                    , null, ['class'=>'form-control','placeholder'=>'Select Religion','required']) !!}
                                                    <p class="text-danger">{{ $errors->first('category') }}</p>
                                                </div>
                                            </div>
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('state','State',['class'=>' control-label']) }}
                                                    {!! Form::text('state', '', ['class'=>'form-control','required']) !!}
                                                    <p class="text-danger">{{ $errors->first('state') }}</p>
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
                                            <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('city','City',['class'=>' control-label']) }}
                                                    {!! Form::text('city','', ['class'=>'form-control','required']) !!}
                                                    <p class="text-danger">{{ $errors->first('city') }}</p>
                                                </div>
                                            </div>
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('p_address','Permanent Address',['class'=>'control-label']) }}
                                                     {{ Form::textarea('p_address','',['class'=>'form-control','rows'=>2  ,'style'=>'resize:none']) }}
                                                     <p class="text-danger">{{ $errors->first('p_address') }}</p>
                                                </div>
                                            </div>
                                             <div class="col-lg-3">                         
                                                <div class="form-group">
                                                    {{ Form::label('c_address',' Correspondence Address',['class'=>'control-label']) }}
                                                     {{ Form::textarea('c_address','',['class'=>'form-control','rows'=>2  ,'style'=>'resize:none']) }}
                                                     <p class="text-danger">{{ $errors->first('c_address') }}</p>
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
 
    $("#class").change(function(){
        $('#section').html('<option value="">Searching ...</option>');
        $.ajax({
          method: "get",
          url: "{{ route('admin.manageSection.search') }}",
          data: { id: $(this).val() }
        })
        .done(function( response ) {            
            if(response.length>0){
                $('#section').html('<option value="">Select Section</option>');
                for (var i = 0; i < response.length; i++) {
                    $('#section').append('<option value="'+response[i].id+'">'+response[i].name+'</option>');
                } 
            }
            else{
                $('#section').html('<option value="">Not found</option>');
            }
            
        });
    });
    
</script>

@endpush