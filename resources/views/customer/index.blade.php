@extends('layouts.dashboard')



<style>
.hideMe{
  display: none;
}
</style>


@section('content')

  <header class="main-header">
  
    <!-- Logo -->
    <a  class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Sky Laundry | @if (Auth::user()->role == 0) 
                User
                 @endif</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Sky Laundry @if (Auth::user()->role == 0) 
                User
                 @endif</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div style="display:none;margin-bottom:0px;line-height:1.1" id="successAlertDiv" class="col-md-4 col-md-offset-3  alert alert-success" role="alert">
              <p> This is a success alert—check it out! </p>
     </div>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
        
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a  class="dropdown-toggle" data-toggle="dropdown">
             <img src="{{url('lte/dist/img/avatar5.png')}}" class="user-image" alt="User Image"> 
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{url('lte/dist/img/avatar5.png')}}" class="img-circle" alt="User Image"> 

                <p>
                 {{ Auth::user()->name }}  - 
                 @if (Auth::user()->role == 0) 
                Customer 
                 @endif
                  <small> {{ Auth::user()->id }}  </small>
                </p>
              </li>
              <!-- Menu Body -->
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{route('customerprofile')}}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                    @auth("web")
                                        <a href="{{ route('user.logout') }}" class="btn btn-default btn-flat">
                                           User Logout
                                        </a>
                                    @endauth 
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
  </header>
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
        <li class="header">COSTUMER NAVIGATION</li>
        <li class="active treeview">
          <a href={{ url('/home') }}>
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
         
        </li>       
                
        <li class="treeview" onclick="myFunction_newOrder(this)">
          <a href="#">
            <i class="fa fa-plus"></i> <span>New Order</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          
        </li>        
               
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Customer Dashboard</li>
      </ol>
    </section>
 

    <!-- Main content mehere-->
    <section class="content">
    
      <div class="container">

      <!-- success div-->
 

      @if(Session::has('success'))
        <div class="row">
          <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
          <div class="alert alert-success" role="alert"  id="success-alert">
              {{Session::get('success')}}
            </div>
          </div>
        </div>
        <script type="text/javascript">
        setTimeout(function () {  
          // Closing the alert
          $('#success-alert').alert('close');
        }, 2000);
        </script>
       @endif  


       <div class="row">
          <div>          
         
          @include('customer.dashboardCustomer')
          </div>


          <div>
          @include('customer.orderForm')
          </div>

 

       
       </div>
       
      </div>
     

    </section>
    <!-- /.content -->
  </div>
@endsection
<script type="text/javascript">
function myFunction_newOrder(elem) {
  document.getElementById("customer_orderForm").style.display = "block";  

  if (document.querySelector('.sidebar-menu li.active') !== null) {
    document.querySelector('.sidebar-menu li.active').classList.remove('active');
  }
  elem.classList.add('active');

  
  document.getElementById("customer_dashboardTable").style.display = "none"; 
   
  
}


function myFunction_driverDashboard(elem) {
  document.getElementById("customer_orderForm").style.display = "none"; 
  document.getElementById("customer_dashboardTable").style.display = "none"; 
  
  if (document.querySelector('.sidebar-menu li.active') !== null) {
    document.querySelector('.sidebar-menu li.active').classList.remove('active');
  }
  elem.classList.add('active');

  
}


</script>