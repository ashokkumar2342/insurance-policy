@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1> Policy  <small>Details</small> </h1>
       
</section>

    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">
               <div class="row">  
                   <div class="col-md-12">  
                       <form  class="add_form" method="post" action="{{ route('admin.policy.daterange') }}" success-content-id="result_div_id" no-reset="true" data-table-without-pagination="result_table_id">
                       {{ csrf_field() }}
                       <div class="col-lg-2" style="padding-top: 20px;"> 
                         <div class="form-group">
                                      {{ Form::label('daterange','Date Range',['class'=>' control-label']) }}
                          <input type="text" name="daterange" class="form-control" value="" />
                        </div>
                       </div> 
                       <div class="col-lg-2" style="padding-top: 20px;"> 
                          <div class="form-group">
                              {{ Form::label('policy_no','Policy No',['class'=>' control-label']) }}
                              {!! Form::text('policy_no','', ['class'=>'form-control','placeholder'=>'Policy No']) !!} 
                          </div> 
                       </div>
                                                                 
                        <div class="col-lg-1" style="padding-top: 40px;"> 
                        <input class="btn btn-success" type="submit" value="show">
                       </div>                     
                     </form> 
                      
                   </div>  
                </div>  
                <div class="row">
                  <div class="col-md-12">
                    <div id="result_div_id">
                     
                   </div>
                  </div>
                   
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- Trigger the modal with a button -->



    </section>
    <!-- /.content -->
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> 
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.1/css/buttons.dataTables.min.css">
   {{-- <link rel="stylesheet" href="{{ asset('admin_asset/plugins/select2/select2.min.css') }}"> --}}
 <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />


<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush 
 @push('scripts')
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 {{-- <script src="{{ asset('admin_asset/plugins/select2/select2.full.min.js') }}"></script> --}}

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>  --}}
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

 
  
  <script> 
$(function() { 
  $('input[name="daterange"]').daterangepicker({
     autoUpdateInput: true,
       
  });
  $('#result_table_id').DataTable();
  
});
</script>
@endpush