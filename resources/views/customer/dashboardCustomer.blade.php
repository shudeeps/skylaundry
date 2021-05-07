 <div id="customer_dashboardTable">
 

<div class="col-md-8 col-md-offset-1">
<table id="customerDashboard" class="table  table-striped table-bordered table-hover table-responsive">
<thead class="thead-dark">
    <tr class="table-primary">
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

  @if (count($Orders)=='0')
    <tr>
      <td></td>
      <td></td>
      <td>No Record</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  @endif


  @foreach ($Orders as $order) 
    <tr>
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

</div>
<script type="text/javascript">


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