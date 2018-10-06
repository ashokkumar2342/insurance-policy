@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <h1> Agent  <small>Details</small> </h1>
      <ol class="breadcrumb">
       <li><span ><a href="{{ route('admin.agent.list') }}" class="btn btn-info btn-sm" >List Agent</a></span></li>        
      </ol>
</section>

    <section class="content">
        <div class="box">             
            <!-- /.box-header -->
            <div class="box-body">
               <section class="content">
                     <div class="container-fluid">
                       <div class="row">
                         <div class="col-md-3">

                           <!-- Profile Image -->
                           <div class="card card-primary card-outline">
                             <div class="card-body box-profile">
                               <div class="text-center">
                                 <img class="profile-user-img img-fluid img-circle" src="{{ $agent->picture }}" alt="User profile picture">
                               </div>

                               <h3 class="profile-username text-center">{{ $agent->name }}</h3>

                               <p class="text-muted text-center">{{ $agent->degination }}</p>

                               <ul class="list-group list-group-unbordered mb-3">
                                 <li class="list-group-item">
                                   <b>Email : </b> <a class="float-right">{{ $agent->email }}</a>
                                 </li>
                                 <li class="list-group-item">
                                   <b>Mobile : </b> <a class="float-right">{{ $agent->mobile }}</a>
                                 </li>
                                  
                               </ul>

                             </div>
                             <!-- /.card-body -->
                           </div>
                           <!-- /.card -->
 
                         </div>
                         <!-- /.col -->
                         <div class="col-md-9"> 
                         </div>
                         <!-- /.col -->
                       </div>
                       <!-- /.row -->
                     </div><!-- /.container-fluid -->
                   </section>
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