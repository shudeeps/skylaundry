@extends('admin.dashboardadmin')

@section('content')
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
        <li>Driver</li>
      </ol>
    </section>
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
    <section class="content-header">
    <h3>Register Users</h3>
</section>
    <!-- Main content mehere-->
    <section class="content">
      <div class="row">
       
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{route('admin.storerole')}}">
            	{{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" placeholder="Enter Email" required>
                </div>
                <div class="form-group">
                  <label>Phone Number</label>
                  <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number" required>
                </div>
                <div class="form-group">
                   <label for="location">Location</label>
                     <select id="location" name="address" class="form-control" required>
                      <option></option>
                       <option value="London">London</option>
                       <option value="Birmingham">Birmingham</option>
                       <option value="Manchester">Manchester</option>
                       <option value="Wolverhampton">Wolverhampton</option>
                     </select>                
                 
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                </div>
                <div class="form-group">
                  <label>Roles</label><br/>
                   <input type="radio" id="driver" name="role" value="2" required>
                   <label for="driver">Driver</label><br>
                   <input type="radio" id="cleaner" name="role" value="1" required>
                   <label for="cleaner">Cleaner</label><br>
                </div>
         
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
    </div>
</section>
    <!-- /.content -->
  </div>
@endsection
