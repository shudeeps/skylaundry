<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function driverprofile(){

        return view('driver.driverprofile');
    }

    public function cleanerprofile(){
        
        return view('cleaner.cleanerprofile');
    }

    public function customerprofile(){
        
        return view('customer.customerprofile');
    }
}
