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
    <section class="content-header">
    <h3>Edit Driver</h3>
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
           
            <form role="form" method="post" action="{{url('admin/drivereditinsert/'.$driver->id)}}">
            	{{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{$driver->name}}" required>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" placeholder="Enter Email" value="{{$driver->email}}" required>
                </div>
                <div class="form-group">
                  <label>Phone Number</label>
                  <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number" value="{{$driver->phone_number}}" required>
                </div>
                <div class="form-group">
                   <label for="location">Location</label>
                     <select id="location" name="address" class="form-control" required>
                      <option value="{{$driver->location}}">{{$driver->location}}</option>
                       <option value="London">London</option>
                       <option value="Birmingham">Birmingham</option>
                       <option value="Manchester">Manchester</option>
                       <option value="Wolverhampton">Wolverhampton</option>
                     </select>                
                 
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
