<center> <h3>Order Status Page</h3>  </center>      
         <br>
          <div class="row col-md-4 offset-7" style="margin: 10px;float:right;">
            <div class="input-group">
              <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                aria-describedby="search-addon" />
              <button type="button" class="btn btn-outline-primary">search</button>
            </div>
          </div>
          <br><br><br><br>
         <table class="table  table-striped table-bordered">
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
               <tr>
                 <th scope="row">1</th>
                 <td>David</td>
                 <th>0777777777</th>
                 <td>2021-3-22</td>
                 <td>2:00 AM</td>
                 <td>Wolverhamption</td>
                 <td>
                  <div class="p-2 mb-2 bg-danger text-white" style="border-radius: 5px;">
                    Pending
                  </div>
                 </td>
                 <td><select class="form-select" aria-label="Default select example">
                  <option selected>Change Status</option>
                  <option value="1">Active</option>
                  <option value="2">Completed</option>
                  <option value="3">Pending</option>
                   </select>
                 </td>
               </tr>
               <tr>
                 <th scope="row">2</th>
                 <td>Amrit</td>
                 <th>0777777777</th>                
                 <td>2021-3-22</td>
                 <td>2:00 AM</td>
                 <td>Birmingham</td>
                 <td>
                  <div class="p-2 mb-2 bg-success text-white" style="border-radius: 5px;">
                    Completed
                  </div>
                 </td>
                 <td><select class="form-select" aria-label="Default select example">
                     <option selected>Change Status</option>
                     <option value="1">Active</option>
                     <option value="2">Completed</option>
                     <option value="3">Pending</option>
                   </select>
                 </td>
               </tr>
               <tr>
                 <th scope="row">3</th>
                 <td>Marcus</td>
                 <th>0777777777</th>
                 <td>2021-3-22</td>
                 <td>2:00 AM</td>
                 <td>London</td>
                 <td>
                  <div class="p-2 mb-2 bg-danger text-white" style="border-radius: 5px;">
                    Pending
                  </div>
                  
                 </td>
                 <td><select class="form-select" aria-label="Default select example">
                  <option selected>Change Status</option>
                  <option value="1">Active</option>
                  <option value="2">Completed</option>
                  <option value="3">Pending</option>
                   </select>
                 </td>
               </tr>
 
               <tr>
                 <th scope="row">3</th>
                 <td>Ribek</td>
                 <th>0777777777</th>
                 <td>2021-3-22</td>
                 <td>2:00 AM</td>
                 <td>London</td>
                 <td>
                  <div class="p-2 mb-2 bg-info text-white" style="border-radius: 5px;">
                    Active
                  </div>

                 </td>
                 <td><select class="form-select" aria-label="Default select example">
                     <option selected>Change Status</option>
                     <option value="1">Active</option>
                     <option value="2">Completed</option>
                     <option value="3">Pending</option>
                   </select>
                 </td>
               </tr>
 
               <tr>
                 <th scope="row">3</th>
                 <td>Sudip</td>
                 <th>0777777777</th>
                 <td>2021-3-22</td>
                 <td>2:00 AM</td>
                 <td>London</td>
                 <td>
                  <div class="p-2 mb-2 bg-success text-white" style="border-radius: 5px;">
                    Completed
                  </div>
                 </td>
                 <td><select class="form-select" aria-label="Default select example">
                     <option selected>Change Status</option>
                     <option value="1">Active</option>
                     <option value="2">Completed</option>
                     <option value="3">Pending</option>
                   </select>
                 </td>
               </tr>
               
                 
             
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