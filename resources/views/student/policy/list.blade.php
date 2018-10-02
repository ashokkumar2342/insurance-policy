@extends('student.layout.base')
@push('links')
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@section('body')
<section class="content-header">
    <h1> Policy<small>List</small> </h1>
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
                    <div class="col-lg-12">
                      <table id="dataTable" class="table table-bordered table-striped table-hover">
                                      <thead>
                                      <tr>
                                        <th>Sn</th>                
                                        <th>Policy Holder Name</th> 
                                
                                        <th>Father Name</th> 
                                        <th>Mother Name</th> 
                                        <th>Email</th> 
                                        <th>Date Of Birth</th> 
                                        <th>Registration No</th> 
                                        <th>Policy No</th> 
                                        <th width="80px">Status</th>                  
                                        <th width="80px">Action</th>                  
                                      </tr>
                                      </thead>
                                      <tbody>
                                      @foreach($policys as $policy)
                                      <tr>
                                        <td>{{ $policy->id }}</td>
                                        <td>{{ $policy->policy_holder_name}}</td>
                                        <td>{{ $policy->father_name }}</td>
                                        <td>{{ $policy->mother_name }}</td>
                                        <td>{{ $policy->email}}</td>
                                        <td>{{ $policy->dob}}</td>
                                        <td>{{ $policy->registration_no}}</td>
                                        <td>{{ $policy->policy_no}}</td>
                                        <td>
                                          <span class="btn btn-xs {{ $policy->status==0?'bg-danger':'bg-success' }}">{{ $policy->status==0?'Pending':'Active'}}</span>
                                        </td>
                                     
                                        
                                        <td align="center">  
                                          <a class="btn btn-warning btn-xs"  href="#"><i class="fa fa-eye"></i></a>  
                                        </td>
                                       
                                      </tr>
                                      @endforeach
                                      </tbody>
                                       
                                    </table>                 
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
 @push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
     $(document).ready(function(){
        $('#dataTable').DataTable();
    });
     
 </script>
@endpush