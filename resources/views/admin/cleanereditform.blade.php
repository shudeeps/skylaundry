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
        <li>Cleaner</li>
      </ol>
    </section>
    <section class="content-header">
    <h3>Edit Cleaner</h3>
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
           
            <form role="form" method="post" action="{{url('admin/cleanereditinsert/'.$cleaner->id)}}">
            	{{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{$cleaner->name}}" required>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" placeholder="Enter Email" value="{{$cleaner->email}}" required>
                </div>
                <div class="form-group">
                  <label>Phone Number</label>
                  <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number" value="{{$cleaner->phone_number}}" required>
                </div>
                 <div class="form-group">
                   <label for="location">Location</label>
                     <select id="location" name="address" class="form-control" required>
                      <option value="{{$cleaner->location}}">{{$cleaner->location}}</option>
                       <option value="London">London</option>
                       <option value="Birmingham">Birmingham</option>
                       <option value="Manchester">Manchester</option>
                       <option value="Wolverhampton">Wolverhampton</option>
                     </select>                
                 
                </div>
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" class="form-control" name="address" placeholder="Enter Address" value="{{$cleaner->location}}" required>
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
