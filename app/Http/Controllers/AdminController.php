<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    public function registerrole()
    {
        return view('admin.userrole');
    }
    public function storerole(Request $request)
    {
        $user=User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
            'phone_number' => $request['phone'],
            'location' => $request['address'],
            'role' => $request['role'],
        ]);
        //dd($user);
        return redirect('admin/registerrole')->with('success', 'User created successfully.');
    }

    public function cleanerdetails()
    {
        $getcleaners  = User::where('role', '=', 1)->get();
        return view('admin.cleanerdetails',compact('getcleaners'));
    }

    public function cleaneredit($id){
         $cleaner = User::find($id);
        return view('admin.cleanereditform',compact('cleaner'));
    }

    public function cleanereditinsert(Request $request,$id){
          $cleaner = User::find($id);
        $cleaner->name = $request->name;
         $cleaner->email = $request->email;
         $cleaner->phone_number = $request->phone;
         $cleaner->location = $request->address;
        $cleaner->save();
        return redirect()->route('admin.cleanerdetails'); 
    }

     Public function cleanerdelete($id){
        User::destroy($id);
        return redirect()->route('admin.cleanerdetails')->with('success', 'Cleaner deleted successfully.');;
    }
    
    public function driverdetails()
    {
        $getdrivers  = User::where('role', '=', 2)->get();
        return view('admin.driverdetails',compact('getdrivers'));
    }

    public function driveredit($id){
         $driver = User::find($id);
        return view('admin.drivereditform',compact('driver'));
    }

    public function drivereditinsert(Request $request,$id){
          $driver = User::find($id);
        $driver->name = $request->name;
         $driver->email = $request->email;
         $driver->phone_number = $request->phone;
         $driver->location = $request->address;
        $driver->save();
        return redirect()->route('admin.driverdetails'); 
    }

     Public function driverdelete($id){
        User::destroy($id);
        return redirect()->route('admin.driverdetails')->with('success', 'Driver deleted successfully.');;
    }

   


    


    

}
