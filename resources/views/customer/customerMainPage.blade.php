<!-- imported the master layout in customer page -->
@extends('customer.mainLayout')

<!-- include the main content  -->
@section('content')
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) shows the status of current page -->
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

    <!-- pop up for successful message -->
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
  
    <!-- Main content mehere which includes the table which is created using datatable -->
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
                     <?php 
                       $orderDetail=array();
                        array_push($orderDetail,$order['collected_status']);
                        array_push($orderDetail,$order['cleaned_status']);
                        array_push($orderDetail,$order['returned_status']);
                        //dd($orderDetail); change array into string
                        $comma_separated = implode(",", $orderDetail);  
                             
                        //dd($comma_separated);             
                      
                      ?>

                     <button id="{{$order['id']}}" rel={{$comma_separated}} class="btn btn-info "  
                  
                     onClick="viewOrderDetailClick(this.id)">
                     <i class="fa fa-eye"></i>
                     Click me</button>
                    
                        </td>
                        <td id="{{$order['id']}}" class='customerPaidStatusClass'>
                    @if ($order['paid']=='1')
                    Yes
                    @else
                    NO
                    @endif
                    </td>
                    <td>
                    <button id="{{$order['id']}}"  class="btn btn-success "  onClick="payOrderClick(this.id)"
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


<!-- style for order status pop up -->
<style>
/* Green vertical line */
.vlG {
  border-left: 6px solid green;
  height: 90px;
  position: relative;
  left: 10%;
  margin: 50px 5px;
  top: 0;
}
/* red vertical line */
.vlR {
  border-left: 6px solid red;
  height: 90px;
  position: relative;
  left: 10%;
  margin: 50px 5px;
  top: 0;
}

/* active class for line */
/* blue (bootstrap info ) vertical line */
.vlI{  
  border-left: 6px solid #31708f;
  height: 90px;
  position: relative;
  left: 10%;
  margin: 50px 5px;
  top: 0;
}
.modal-body h2{
  margin:30px 21px;
  color: darkorchid;
}
.modal-body i{
  margin:-45px 0px -32px -20px;  
}
.lightGray{
  color:lightgray;
}
.lastIcon{
  margin:0px 0px 5px 68px;
}
</style>

<!-- order status module pop up using bootstrap -->
<!-- Modal -->
<div class="modal fade" style="display:none" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Order Status</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

   
      <div class="vlR" id="driver">
      <i class="fa fa-hourglass-start fa-3x text-success "></i>      
      <h2>Driver Not pick   </h2>      
      </div>


      <div class="vlR" id="cleaner">
      <i class="fa fa-check-circle fa-3x lightGray"></i>     
      <h2>Cleaner Not assigned</h2>
      
      </div>

      <div class="vlR" id="returnDriver">
      <i class="fa fa-check-circle fa-3x lightGray"></i>

      <!-- <i class="fa fa-refresh fa-spin fa-3x fa-fw text-dark"></i> -->
      <h2>Returned driver Not assigned</h2>
      </div>


      <div class="lastIcon">
      <i class="fa fa-check-circle fa-3x lightGray"></i>
          
      </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      
      </div>
      
    </div>
  </div>
</div>

     
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

//order detail ajax call and pop up bootstap module
function viewOrderDetailClick(clicked){
statusValue= $("#customerDashboard tbody tr").find("td button#"+clicked).attr('rel');
$("#statusModal").modal('show');
//  console.log(statusValue);
//  console.log(statusValue[0]);
//  console.log(statusValue[2]);
//  console.log(statusValue[4]);


//collected by driver
switch (statusValue[0]) {
  case '0':
    text = "Driver Not assigned ";
    $("#statusModal .modal-body #cleaner i").removeClass('fa-refresh fa-spin text-info text-success').addClass('fa-check-circle lightGray'); 
    $("#statusModal .modal-body #driver").removeClass('vlI vlG').addClass('vlR');
     break;
  case '1':
    text = "Driver is on the way";
    $("#statusModal .modal-body #cleaner i").removeClass('fa-check-circle lightGray text-success').addClass('fa-refresh fa-spin text-info');
    $("#statusModal .modal-body #driver").removeClass('vlR vlG').addClass('vlI');
    break;
  default:
    text = "Driver droped to cleaner";
    $("#statusModal .modal-body #cleaner i").removeClass('fa-refresh fa-spin text-info lightGray').addClass('fa-check-circle text-success'); 
    $("#statusModal .modal-body #driver").removeClass('vlR vlI').addClass('vlG');

}
console.log(text);
$("#statusModal .modal-body #driver h2").html(text);




//cleaner status
switch (statusValue[2]) {
  case '0':
    text = "Cleaner not assigned";
    $("#statusModal .modal-body #returnDriver i").removeClass('fa-refresh fa-spin text-info text-success').addClass('fa-check-circle lightGray'); 
     $("#statusModal .modal-body #cleaner").removeClass('vlI vlG').addClass('vlR');
    
    break;
  case '1':
    text = "cleaning";
    $("#statusModal .modal-body #returnDriver i").removeClass('fa-check-circle lightGray text-success').addClass('fa-refresh fa-spin text-info');
    $("#statusModal .modal-body #cleaner").removeClass('vlR vlG').addClass('vlI');

    break;
  default:
    text = "cleaning is done";
    $("#statusModal .modal-body #returnDriver i").removeClass('fa-refresh fa-spin text-info lightGray').addClass('fa-check-circle text-success'); 
    $("#statusModal .modal-body #cleaner").removeClass('vlR vlI').addClass('vlG');
}
console.log(text);
$("#statusModal .modal-body #cleaner h2").html(text);



//returned status by driver
switch (statusValue[4]) {
  case '0':
    text = "Returned Driver not Assigned";
    $("#statusModal .modal-body .lastIcon i").removeClass('fa-refresh fa-spin text-info text-success').addClass('fa-check-circle lightGray'); 
    $("#statusModal .modal-body #returnDriver").removeClass('vlI vlG').addClass('vlR');
    
    break;
  case '1':
    text = "Driver is on the way to return";
    $("#statusModal .modal-body .lastIcon i").removeClass('fa-check-circle lightGray text-success').addClass('fa-refresh fa-spin text-info');
    $("#statusModal .modal-body #returnDriver").removeClass('vlR vlG').addClass('vlI');
   break;
  default:
    text = "Driver returned to customer";
    $("#statusModal .modal-body .lastIcon i").removeClass('fa-refresh fa-spin text-info lightGray').addClass('fa-check-circle text-success'); 
    $("#statusModal .modal-body #returnDriver").removeClass('vlR vlI').addClass('vlG');
  }
console.log(text);
$("#statusModal .modal-body #returnDriver h2").html(text);


}


//change the pay order status into paid  
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