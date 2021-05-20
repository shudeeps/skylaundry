@extends('customer.mainLayout')

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
        <li>Customer</li>
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
            <div class="box-body" id="customerDashboard">
              <table id="driverDashboardTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th scope="col">Order ID</th>
                <th scope="col">Description</th>
                <th scope="col">Order Date</th>
                <th scope="col">Time</th>
                <th scope="col">Delivery Status</th>      
                <th scope="col">paid Status</th>
                <th scope="col">Click to pay</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($Orders as $order)
               <tr id={{$order->orderId}}>
               <td scope="row">{{$order['id']}}</td>
                        <td scope="row">{{$order['description']}}</td>      
                        <td scope="row">{{$order['pickUpDate']}}</td>
                        <td scope="row">{{$order['pickUpTime']}}</td>
                        <td>

                        @if ($order['cleaned_status']==0)
                        Not Cleaned
                        @elseif ($order['cleaned_status']==1)      
                        Active
                        @elseif ($order['cleaned_status']==2)  
                        completed  
                        @endif


                        </td>
                        <td id="{{$order['id']}}" class='customerPaidStatusClass'>
                    @if ($order['paid']=='1')
                    Yes
                    @else
                    NO
                    @endif
                    </td>
                    <td>
                    <button id="{{$order['id']}}" class="btn btn-success "  onClick="payOrderClick(this.id)"
                    {{ $order['paid']?  'disabled' : '' }}
                    
                    >{{ $order['paid']?  'paid' : 'pay here' }}</button>
                    
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
        <div>
          @include('customer.orderForm')
          </div>
      </div>
      <!-- /.row -->
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

  
  document.getElementById("customerDashboard").style.display = "none"; 
   
  
}


function myFunction_driverDashboard(elem) {
  document.getElementById("customer_orderForm").style.display = "none"; 
  document.getElementById("customerDashboard").style.display = "none"; 
  
  if (document.querySelector('.sidebar-menu li.active') !== null) {
    document.querySelector('.sidebar-menu li.active').classList.remove('active');
  }
  elem.classList.add('active');

  
}


function payOrderClick(clicked) {


$.ajax({
    url: "/customer/payOrderClick/" + clicked,
    type:"GET",
      success:function(response){
      console.log(response);
      if(response) {         
        // $("#driverDashboardTable tbody ").find("tr#"+orderId).hide();
       // $("#customerDashboard tbody ").find("tr#"+orderId).fadeOut(1500);;

        $("#customerDashboard tbody tr").find("td#"+clicked).html('YES');
        $("#customerDashboard tbody tr").find("td button#"+clicked).prop('disabled', true).text('paid');

        $('.navbar #successAlertDiv').show().fadeOut(2500);
     // let orderCount=  $('.sidebar .sidebar-menu li span#myOrderCount').val();
     
      }
    },
   });


}
</script>