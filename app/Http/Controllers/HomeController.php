<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Order;
use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role=Auth::user()->role;
       

        switch ($role) {

            //cleaner
            case '1':
                $location=Auth::user()->location;   
                $Orders = DB::table('orders')
                ->distinct()
                ->select('orders.*','users.*','orders.id as orderId')
                ->leftJoin('users', function ($join) {
                    $join->on('orders.user_id', '=', 'users.id');
                })
                ->where('users.role', '=', 0)
                ->where('users.location', '=', $location)
                ->where('orders.collected_status', '=', '2')
                ->where('orders.cleaned_status', '=', '0')
                ->orwhere('orders.cleaned_status', '=', '1')
                ->get();

                   //  dd($Orders);

                     return view('cleaner.index',compact('Orders'));
                break;
            case '2':
                // driver  test
                $location=Auth::user()->location;   
                $Orders = DB::table('orders')
                ->distinct()
                ->select('orders.*','users.*','orders.id as orderId')
                ->leftJoin('users', function ($join) {
                    $join->on('orders.user_id', '=', 'users.id');
                })
                ->where('users.role', '=', 0)
                ->where('users.location', '=', $location)
                ->where('orders.collected_status', '=', 0)
                ->get();

                $orderCount = Order::where('driverId_FK','=',Auth::user()->id)
                ->where('orders.collected_status', '=', 1)
                ->count();
               return view('driver.index',compact('Orders','orderCount'));
                break;
            default:   
            
            //customer
            // $Orders = Auth::user()->orders->sortByDesc('id')->where('collected_status','=',NULL);   
            $Orders = Auth::user()->orders->sortByDesc('id');   
            //  dd($Orders);       
            // $userId=Auth::user()->id;
            // $Orders = Order::where('user_id',$userId)->orderBy('id', 'DESC')->get();  
          //  dd($Orders);
                return view('customer.index',compact('Orders'));
                break;
        }

       // return view('home1');
    }
}
