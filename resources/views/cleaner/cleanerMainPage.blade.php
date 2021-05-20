@extends('cleaner.mainLayout')

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
  
    <!-- Main content mehere-->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
                <!-- /.box-header -->
            <div class="box-body" id="cleaner_dashboard">
              <table id="driverDashboardTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th scope="col">Order Id</th>
                <th>Customer Name</th>
                <th>Phone Number</th>
                <th scope="col">Delivery Date</th>
                <th scope="col">Delivery Time</th>
                <th scope="col">Location</th>
                <th scope="col">Cleaned Status</th>
                <th>Change Status</th>

                </tr>
                </thead>
                <tbody>
                @foreach ($Orders as $order)
   <tr id={{$order->orderId}}>
       <td scope="row">{{$order->orderId}}</td>
       <td>{{$order->name}}</td>
       <td>{{$order->phone_number}}</td>
       <td>{{$order->pickUpDate}}</td>
       <td>{{$order->pickUpTime}}</td>
       <td>{{$order->location}}</td>
       <td id="{{$order->orderId}}">
    
        @if($order->cleaned_status==1)
        Active
        @elseif($order->cleaned_status==2)
        Completed
        @else
        Pending
        @endif    
  
       </td>
       <td>
       
         <select id="change"  class="form-select target" 
                 orderId={{$order->orderId}} 
                 aria-label="Default select example"
                 onchange="changeStatusByCleaner(this,{{$order->orderId}});"
                 >

                  <option rel='22' value="0" <?php if($order->cleaned_status==0) echo 'selected' ?>>Pending</option>
                  <option rel='33' value="1" <?php if($order->cleaned_status==1) echo 'selected' ?> >Active</option>
                  <option rel='34' value="2" <?php if($order->cleaned_status==2) echo 'selected' ?>>Completed</option>
                 
                   </select>


       </td>
     </tr>

     @endforeach
              
                
                </tbody>
                
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



     
<script type="text/javascript">


function changeStatusByCleaner(sel,orderId)
{
 
 selectedValue=sel.value;
 var selectedText = sel.options[sel.selectedIndex].innerHTML;
 let _token   = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
        url: "/cleaner/cleanerChangeStatus",
        type:"POST",
        data:{
          value:selectedValue,
          orderId:orderId,         
          _token: _token
        },
        success:function(response){
          console.log(response);
          if(response) {         
            //$("#cleanerDashboardTable tbody ").find("tr#"+orderId).fadeOut(1500);;
            $("#cleaner_dashboard tbody tr").find("td#"+orderId).html(selectedText);
            $('.navbar #successAlertDiv').show().fadeOut(2500);
         // let orderCount=  $('.sidebar .sidebar-menu li span#myOrderCount').val();
       //   $(".sidebar .sidebar-menu li span#myOrderCount").html(parseInt($(".sidebar .sidebar-menu li span#myOrderCount").html())+1)
         
          }
        },
       });

    
}
</script>