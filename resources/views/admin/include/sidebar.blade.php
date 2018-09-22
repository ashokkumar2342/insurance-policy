<!-- =============================================== -->

<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
 
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <!-- Sidebar user panel -->
                            <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                  <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                  </button>
                </span>
          </div>
        </form>
        <!-- /.search form -->
    <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li> 
          
         
        <li ><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboad</span></a></li>
        
             
              
        <li class="treeview">
            <a href="#">
                <i class="fa fa-user"></i>
                <span>Account</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('admin.account.form') }}"><i class="fa fa-circle-o"></i> Add </a></li>
                <li><a href="{{ route('admin.account.list') }}"><i class="fa fa-circle-o"></i> List</a></li>
                <li><a href="{{ route('admin.userClass.list') }}"><i class="fa fa-circle-o"></i> User + Class</a></li>

                
            </ul>
        </li> 
        @if(Auth::guard('admin')->user()->minus()->where('minu_id',1)->first()->status == 1)
        <li class="treeview">
            <a href="#">
                <i class="fa fa-user"></i>
                <span>Student</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('admin.student.form') }}"><i class="fa fa-circle-o"></i> Add</a></li>               
                
                <li><a href="{{ route('admin.student.list') }}"><i class="fa fa-circle-o"></i> List</a></li>

            </ul>
        </li>
        @endif
        <li class="treeview">
            <a href="#">
                <i class="fa fa-cogs"></i>
                <span>Manage</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>            
            <ul class="treeview-menu">
                @if(Auth::guard('admin')->user()->minus()->where('minu_id',2)->first()->status == 1)
                <li><a href="{{ route('admin.class.list') }}"><i class="fa fa-circle-o"></i> Add Class</a></li>
                <li><a href="{{ route('admin.section.list') }}"><i class="fa fa-circle-o"></i> Add Section</a></li>
                @endif
                {{-- <li><a href="{{ route('admin.account.classfee.list') }}"><i class="fa fa-circle-o"></i> Class Fee</a></li> --}}
                <li><a href="{{ route('admin.manageSection.list') }}"><i class="fa fa-circle-o"></i> Manage Section</a></li>
            </ul>
        </li>      
        <li class="treeview">
            <a href="#">
                <i class="fa fa-newspaper-o"></i>
                <span>Subject</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('admin.subjectType.list') }}"><i class="fa fa-circle-o"></i> Subject Type </a></li>               
                <li><a href="{{ route('admin.subject.manageSubject') }}"><i class="fa fa-circle-o"></i> Manage Subject </a></li>            
                
            </ul>
        </li>
         
        <li class="treeview">
            <a href="#">
                <i class="fa fa-paper-plane-o"></i>
                <span>User Activity</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('admin.activity.list') }}"><i class="fa fa-circle-o"></i> Activity List </a></li>              
                
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-sticky-note"></i>
                <span>Homework</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href=""><i class="fa fa-circle-o"></i> Add </a></li>               
                
            </ul>
        </li>
        
     
</section>
<!-- /.sidebar -->
</aside>

<!-- =============================================== -->