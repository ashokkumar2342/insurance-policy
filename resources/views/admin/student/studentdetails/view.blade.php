@extends('admin.layout.base')
@push('links')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@section('body')

    <section class="content">
      <div class="box">  
      <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#home">Student Basic Info</a></li>
          <li><a data-toggle="tab" href="#parent-info">Parent Info</a></li>
          <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
          <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
        </ul>

       
      <!-- /.box-header -->
          <div class="box-body"> 
            <div class="tab-content">
              <div id="home" class="tab-pane fade in active">
                    <div class="col-md-9">
                      <div class="row">
                           <div class="col-md-6">
                           <h4> Username : <b>{{ $student->username }}</b></h4>
                          </div>
                          <div class="col-md-6">
                              <h4> Name : <b>{{ $student->name }}</b></h4>
                          </div>                     
                           <div class="col-md-6">
                            <h4> Class : <b>{{ $student->classes->name or '' }}</b></h4>                      
                           </div>
                           <div class="col-md-6">
                            <h4> Section : <b>{{ $student->sectionTypes->name or '' }}</b></h4>                      
                           </div>
                           <div class="col-md-6">
                            <h4> Registration No : <b>{{ $student->registration_no or '' }}</b></h4> 
                           </div>
                           <div class="col-md-6">
                            <h4> Addmission No : <b>{{ $student->admission_no or '' }}</b></h4> 
                           </div>
                           <div class="col-md-6">
                            <h4> Date Of Addmission : <b>{{ $student->date_of_admission or '' }}</b></h4> 
                           </div>
                           <div class="col-md-6">
                            <h4> Date Of Leaving : <b>{{ $student->date_of_leaving or '' }}</b></h4> 
                           </div>
                           <div class="col-md-6">
                            <h4> Date Of Activation : <b>{{ $student->date_of_activation or '' }}</b></h4> 
                           </div>
                           <div class="col-md-6">
                            <h4> Father's Name : <b>{{ $student->father_name }}</b></h4>
                           </div>
                           <div class="col-md-6">
                            <h4> Mother's Name : <b>{{ $student->mother_name }}</b></h4>
                           </div>
                           <div class="col-md-6">
                            <h4> Father's Name : <b>{{ $student->father_mobile }}</b></h4>
                           </div>
                           <div class="col-md-6">
                            <h4> Mother's Name : <b>{{ $student->mother_mobile }}</b></h4>
                           </div>
                           <div class="col-md-6">
                            <h4> Date Of Birth : <b>{{ $student->dob or '' }}</b></h4>                      
                           </div>
                           <div class="col-md-6">
                            <h4> Permanent Address : {{ $student->p_address }}</h4>                      
                            </div>                    
                            <div class="col-md-6">
                            <h4> Correspondence Address : {{ $student->p_address }}</h4>                      
                            </div> 
                      </div>
                  </div>
                    <div class="col-md-3">
                      @php
                      $profile = route('admin.student.image',$student->picture);
                      @endphp
                      <div class="col-md-12">
                       <div id="showImg">
                          <div style="width: 150px; height: 180px;  background-color: #eee; border: 2px solid #d1f7ec">
                            <img  src="{{ ($student->picture)? $profile : asset('profile-img/user.png') }}" style="width: 150px; height: 180px;  border: 2px solid #d1f7ec">
                          </div>
                          <div style="padding-left: 30px; padding-top: 5px;">
                        <a class="btn btn-success btn-xs" href="javascript:;">Change Image</a>
                              
                          </div>
                      </div>                                  
                  </div>       
                </div>    
              </div>
              <div id="parent-info" class="tab-pane fade">
                <h3>Parent Information</h3>
                 <div class="col-lg-3">                         
                    <div class="form-group">
                        {{ Form::label('father_name','Father Name',['class'=>' control-label']) }}                         
                        {{ Form::text('father_name',$student->father_name,['class'=>'form-control',' required']) }}
                        <p class="text-danger">{{ $errors->first('father_name') }}</p>
                    </div>
                </div>
                 <div class="col-lg-3">                         
                    <div class="form-group">
                        {{ Form::label('mother_name','Mother Name',['class'=>' control-label']) }}                         
                        {{ Form::text('mother_name',$student->mother_name,['class'=>'form-control ',' required']) }}
                        <p class="text-danger">{{ $errors->first('mother_name') }}</p>
                    </div>
                </div>
                <div class="col-lg-3">                         
                    <div class="form-group">
                        {{ Form::label('father_mobile','Father Mobile Number',['class'=>' control-label']) }}                         
                        {{ Form::text('father_mobile',$student->father_mobile,['class'=>'form-control ',' required']) }}
                        <p class="text-danger">{{ $errors->first('father_mobile') }}</p>
                         
                    </div>
                </div>
                 <div class="col-lg-3">                         
                    <div class="form-group">
                        {{ Form::label('mother_mobile','Mother Mobile Number',['class'=>' control-label']) }}                         
                        {{ Form::text('mother_mobile',$student->mother_mobile,['class'=>'form-control ',' required']) }}
                        <p class="text-danger">{{ $errors->first('mother_mobile') }}</p>
                    </div>
                </div>
              </div>
              <div id="menu2" class="tab-pane fade">
                <h3>Menu 2</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
              </div>
              <div id="menu3" class="tab-pane fade">
                <h3>Menu 3</h3>
                <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
              </div>
            </div>
              
            <!-- /.box-body -->
        </div>
          <!-- /.box -->
          <!-- Trigger the modal with a button -->
        <div class="row" id="crop-show">
            <div class="col-md-4 text-center">
            <div id="upload-demo" style="width:350px"></div>
            </div>
            <div class="col-md-4" style="padding-top:30px;">
            <strong>Select Image:</strong>
            <br/>
            <input type="file" id="upload">
            <br/>
            <button class="btn btn-success upload-result">Upload Image</button>
            <button class="btn btn-danger" id="crop-hide">Hide</button>
            </div>    
        </div>
    </section>
    <!-- /.content -->
    <!-- Trigger the modal with a button -->
  </div>
</div>
</div>
 
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
 <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/croppie.css">
 <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush
 @push('scripts')
 <script src="http://demo.itsolutionstuff.com/plugin/croppie.js"></script>
 
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script type="text/javascript">
     $(document).ready(function(){
      $( ".datepicker" ).datepicker({dateFormat:'dd-mm-yy'});
        $('#dataTable').DataTable();
    });
     var errors = '{{ $errors->first() }}';
     if (errors) {
      $("#addfee").modal('show');
     }
 </script>
 <script type="text/javascript"> 
  $(document).ready(function(){
    $("#crop-show").hide();
    $('#showImg').on('click','a',function(){
      $('#crop-show').show();            
    });
    $('#crop-hide').on('click',function(){
      $('#crop-show').hide();           
    });
  });
</script>
<script type="text/javascript">
$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

$uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
        width: 200,
        height: 250,         
    },
    boundary: {
        width: 300,
        height: 300
    }
});

$('#upload').on('change', function () { 
  var reader = new FileReader();
    reader.onload = function (e) {
      $uploadCrop.croppie('bind', {
        url: e.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
});

$('.upload-result').on('click', function (ev) {
  $uploadCrop.croppie('result', {
    type: 'canvas',
    size: 'viewport'
  }).then(function (resp) {
    $.ajax({
      url: "{{ route('admin.student.profilepic.update',$student->id) }}",
      type: "POST",
      data: {"image":resp},
      success: function (data) {        
        $("#showImg").load(location.href + ' #showImg');
         $('#crop-show').hide(); 
      }
    });
  });
});

</script>
  
@endpush