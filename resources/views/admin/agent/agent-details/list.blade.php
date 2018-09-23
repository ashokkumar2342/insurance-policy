@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1> Agent  <small>List</small> </h1>
      <ol class="breadcrumb">
       <li><span ><a href="{{ route('admin.agent.form') }}" class="btn btn-info btn-sm" >Add Agent</a></span></li>        
      </ol>
</section>

    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">
              <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>               
                  <th>ID</th> 
                  
                  <th>Name</th>
                  <th>Father Name</th> 
                  <th width="80px">Action</th>                  
                </tr>
                </thead>
                <tbody>
                @foreach($agents as $agent)
                <tr>
                  <td>{{ $agent->username }}</td>
                  
                  <td>{{ $agent->name }}</td>
                  <td>{{ $agent->father_name }}</td>
                   
                  <td align="center">
                   <a class="btn btn-primary btn-xs" title="View agent" href="{{ route('admin.agent.view',$agent->id) }}"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-warning btn-xs" title="Edit agent" href="{{ route('admin.agent.edit',$agent->id) }}"><i class="fa fa-pencil"></i></a>
                    {{-- <a onclick="return confirm('Are you sure to reset this agent password.')" class="btn btn-danger btn-xs" title="Password Reset" href="{{ route('admin.agent.passwordreset',$agent->id) }}"><i class="fa fa-key"></i></a> --}}                    
                    @if (Auth::guard('admin')->user()->id == 1)
                    <a onclick="return confirm('Are you sure to delete agent.')" class="btn btn-danger btn-xs" title="delete agent" href="{{ route('admin.agent.delete',$agent->id) }}"><i class="fa fa-times"></i></a> 
                    @endif
                    
                  </td>
                 
                </tr>
                @endforeach
                </tbody>
                 
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- Trigger the modal with a button -->



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