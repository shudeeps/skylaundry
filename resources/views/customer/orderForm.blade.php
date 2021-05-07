

<div class="row hideMe" id="customer_orderForm">
<div class="col-md-3">
</div>
<div class="col-md-4 col-sm-6">

  <div class="register-box-body">
    <p class="login-box-msg">Please enter the order detail</p>

     <form action="{{ route('customer.makeOrder') }}" method="post">
        {{ csrf_field() }}
    
      <div class="form-group">
      <label for="pickUpDate">Select pickUp date</label>
        <input id="pickUpDate" type="date" class="form-control" name="pickUpDate" placeholder="Pick Up Date" value="{{ old('pickUpDate') }}" required autofocus>
                                @if ($errors->has('pickUpDate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pickUpDate') }}</strong>
                                    </span>
                                @endif
     
      </div>
      <div class="form-group">
      <label for="pickUpTime">Select pickUp time</label>
        <input id="pickUpTime" type="time" class="form-control" name="pickUpTime" 
        placeholder="Pick Up Time" value="{{ old('pickUpTime') }}" required autofocus>
                                @if ($errors->has('pickUpTime'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pickUpTime') }}</strong>
                                    </span>
                                @endif
       
      </div>
      <div class="form-group">
       <label for="pickUpDate">Description</label>
        <textarea id="description" name="description" rows="4" cols="35">
 
          </textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
    
      </div>
      <input type="hidden" name="user_id" value={{ Auth::user()->id }}>
      <div>
          <button type="submit" class="btn btn-primary btn-block btn-flat">Make Order</button>
        </div>
   
      </div>
    </form>

  
  </div>

  </div>
  <!-- /.form-box -->
</div>

</div>
