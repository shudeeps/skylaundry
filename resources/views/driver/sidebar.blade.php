<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('lte/dist/img/avatar5.png')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
    
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">DRIVER NAVIGATION</li>
        <li class="active treeview">
          <a href={{ url('/home') }}>
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
         
        </li>       
                


        <li class="treeview">
          <a href={{ route('driver.myAddedlist') }}>
            <i class="fa fa-list-ul"></i>
             <span>    My Added List   </span>
            <span class="pull-right-container">
            <span class="badge badge-light" style="margin-top:0;background-color:blue" id="myOrderCount">
            {{$orderCount}}
            </span> 
            <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          
        </li>       
        <li class="treeview">
          <a href={{ route('driver.myReturnlist') }}>
            <i class="fa fa-list-ul"></i>
             <span>    My return List   </span>
            <span class="pull-right-container">
            
            <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          
        </li>   
               
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>