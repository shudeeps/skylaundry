<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Auth;
use Session;


class orderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    public function index()
    {
       


     }

     public function showOrderForm(){
        return view('customer.orderForm');
     }



   public function makeOrder(Request $request)
   {
         //dd($request->all());
         //$Order = new Order;
         
         $status= Order::create($request->all());
         
         return redirect()->route('home')
         ->with('success', 'Order created successfully.');
         
   }

   public function driverChangeStatus(Request $request){
      $data = $request->all();     
      $orderId=$data['orderId'];
      $value=$data['value'];
      $response=Order::where('id', $orderId)      
      ->update(['collected_status' => $value,'driverId_FK'=>Auth::user()->id]);
    
   
   return response()->json(['success'=>'Request changed successfully']);
      
   }

   public function cleanerChangeStatus(Request $request){
      $data = $request->all();     
      $orderId=$data['orderId'];
      $value=$data['value'];
      $response=Order::where('id', $orderId)      
      ->update(['cleaned_status' => $value,'cleanerId_FK'=>Auth::user()->id]);
    
   
   return response()->json(['success'=>'Request changed successfully']);
      
   }


   public function driverAddedlist(){
  
      $Orders = Order::where('driverId_FK','=',Auth::user()->id)     
      ->distinct() 
      ->select('orders.*','users.*','orders.id as orderId')
      ->leftJoin('users', function ($join) {
          $join->on('orders.user_id', '=', 'users.id');
      })
      ->where('users.role', '=', 0)    
      ->where('orders.collected_status', '=', 1)
      ->get();

      $orderCount = $Orders->count();
      return view('driver.driverAddedList',compact('Orders','orderCount'));

      // dd($Orders);
   }

   public function payOrderClick($orderId){
     // dd($orderId);
        
      $response=Order::where('id', $orderId)      
      ->update(['paid' => 1]);
    
   
   return response()->json(['success'=>'Request changed successfully']);
      
   }

   public function driverReturnlist(){

     //dd(Auth::user()->id);
  
      $Orders = Order::where('driverId_FK','=',Auth::user()->id)     
      ->distinct() 
      ->select('orders.*','users.*','orders.id as orderId')
      ->leftJoin('users', function ($join) {
          $join->on('orders.user_id', '=', 'users.id');
      })
      ->where('users.role', '=', 0)    
      ->where('orders.cleaned_status', '=', 2)
      ->get();
 // dd($Orders);
      $orderCount = $Orders->count();
      return view('driver.driverReturnList',compact('Orders','orderCount'));

      // dd($Orders);
   }
    
}
