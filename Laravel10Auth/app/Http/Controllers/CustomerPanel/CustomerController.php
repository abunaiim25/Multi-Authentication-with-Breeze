<?php

namespace App\Http\Controllers\CustomerPanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function redirect()
    {
        if(Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif(Auth::user()->role === 'vendor') {
            return redirect()->route('vendor.dashboard');
        }

        //return view('dashboard');//off step 12
        return redirect()->route('customer.index');// step 12
    }
}
