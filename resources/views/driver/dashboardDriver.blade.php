
<div class="col-md-11"  id="driver_dashboard">

          <div class="row col-md-4 col-md-offset-7" style="margin: 10px;float:right;">
            <div class="input-group">
              <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                aria-describedby="search-addon" />
              <button type="button" class="btn btn-outline-primary"></button>
            </div>
          </div>
          <br><br><br><br>
         <table id="driverDashboardTable" class="table table-hover table-striped table-bordered">
             <thead>
               <tr class="table-primary"> 
                 <th scope="col">Order Id</th>
                 <th>Customer Name</th>
                 <th>Phone Number</th>
                 <th scope="col">Delivery Date</th>
                 <th scope="col">Delivery Time</th>
                 <th scope="col">Location</th>
                 <th scope="col">Status</th>
                 <th>Change Status</th>
 
               </tr>
             </thead>
             <tbody>
             @if (count($Orders)=='0')
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>No Record</td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  @endif


             @foreach ($Orders as $order)
               <tr id={{$order->orderId}}>
                 <td scope="row">{{$order->orderId}}</td>
                 <td>{{$order->name}}</td>
                 <td>{{$order->phone_number}}</td>
                 <td>{{$order->pickUpDate}}</td>
                 <td>{{$order->pickUpTime}}</td>
                 <td>{{$order->location}}</td>
                 <td class="statusBox"id={{$order->orderId}}>
                  <div class="p-2 mb-2">
                  @if($order->collected_status==1)
                   Active
                   @elseif($order->collected_status==2)
                   Completed
                   @else
                   Pending
                  @endif                
                  </div>
                 </td>
                 <td>
                 <select id="change"  class="form-select target" 
                 orderId={{$order->orderId}} 
                 aria-label="Default select example"
                 onchange="changeStatusByDriver(this,{{$order->orderId}});"
                 >

                  <option rel='22' value="0" <?php if($order->collected_status==0) echo 'selected' ?>>Pending</option>
                  <option rel='33' value="1" <?php if($order->collected_status==1) echo 'selected' ?> >Active</option>
                  <option rel='34' value="2" <?php if($order->collected_status==2) echo 'selected' ?>>Completed</option>
                 
                   </select>
                 </td>
               </tr>

               @endforeach
                
             </tbody>
           </table>
           <div style="float:right;">
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
              </ul>
            </nav>
           </div>
           <div style="min-height:100px"></div>
         </div>

        </div>



<script type="text/javascript">

function changeStatusByDriver(sel,orderId)
{
 
 selectedValue=sel.value;
 var selectedText = sel.options[sel.selectedIndex].innerHTML;
 let _token   = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
        url: "/driver/driverChangeStatus",
        type:"POST",
        data:{
          value:selectedValue,
          orderId:orderId,         
          _token: _token
        },
        success:function(response){
          console.log(response);
          if(response) {         
            $("#driverDashboardTable tbody ").find("tr#"+orderId).fadeOut(1500);;

            $('.navbar #successAlertDiv').show().fadeOut(2500);
         // let orderCount=  $('.sidebar .sidebar-menu li span#myOrderCount').val();
          $(".sidebar .sidebar-menu li span#myOrderCount").html(parseInt($(".sidebar .sidebar-menu li span#myOrderCount").html())+1)
         
          }
        },
       });

    
}
</script>