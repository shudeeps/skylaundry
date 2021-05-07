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
    <h3>Cleaner Details</h3>
</section>
    <!-- Main content mehere-->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Cleaner Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Location</th>
                  <th> Actions </th>
                </tr>
                </thead>
                <tbody>
                	@foreach($getcleaners as $cleaner)
                <tr>
                  <td>{{$cleaner->name}}</td>
                
                  <td>{{$cleaner->email}}</td>
                  <td>{{$cleaner->phone_number}}</td>
                  <td>{{$cleaner->location}}</td>
                  <td>
                           <div>
                            <div class="btn-group">
                                <button class="btn btn-xs btn-green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Actions
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-left" role="menu">
                                    <li>
                                        <a href="{{url('admin/cleaneredit/'.$cleaner->id)}}">
                                            <i class="icon-docs"></i> <button class="btn btn-xs btn-primary">Edit </button>
                                        </a>
                                    </li>
                                    <li>
                                        
                                       <a href="{{url('admin/cleanerdelete/'.$cleaner->id)}}">
                                            <i class="icon-docs"></i> <button class="btn btn-xs btn-danger">Delete </button>
                                        </a>

                                       
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone Number</th>
                  <th>Location</th>
                  <th> Actions </th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection
