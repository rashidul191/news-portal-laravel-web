<?php

namespace App\Http\Controllers;

use App\Models\AdminLogin;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin.login.index');
    }

    public function login(Request $request)
    {
        $check = $request->all();

        if (Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            // return 'ok';
            return redirect()->route('admin.dashboard')->with('success', 'You are Successfully Loged-in..!!');
        } else {
            return back()->with('error', 'Invalid Email Or Password');
        }
        return view('admin.layouts.master');
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        Session::flush(); // সমস্ত সেশন ডেটা মুছে ফেলা
        return redirect()->route('login.page')->with('error', 'Logout Successfully!');
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show(AdminLogin $adminLogin)
    {
        //
    }
    public function edit(AdminLogin $adminLogin)
    {
        //
    }
    public function update(Request $request, AdminLogin $adminLogin)
    {
        //
    }
    public function destroy(AdminLogin $adminLogin)
    {
        //
    }
}
