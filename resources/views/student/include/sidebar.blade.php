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
          
         
        <li ><a href="{{ route('student.dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboad</span></a></li>
        
             
              
        <li class="treeview">
            <a href="#">
                <i class="fa fa-user"></i>
            <span>Agent</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu"> 
                 <li><a href="{{ route('agent.form') }}"><i class="fa fa-circle-o"></i> Add </a></li>   
                 <li><a href="{{ route('agent.list') }}"><i class="fa fa-circle-o"></i> List </a></li>   
                
            </ul>
        </li> 
        <li class="treeview">
            <a href="#">
                <i class="fa fa-sticky-note"></i>
                <span>Policy</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ route('policy.form') }}"><i class="fa fa-circle-o"></i> Form </a></li>
                <li><a href="{{ route('policy.list') }}"><i class="fa fa-circle-o"></i> List </a></li>
                
            </ul>
        </li>
        
         
        
     
</section>
<!-- /.sidebar -->
</aside>

<!-- =============================================== -->
