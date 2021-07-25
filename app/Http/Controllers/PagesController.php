<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function dashboard(){
        // if (Auth::check()) {
            return view('dashboard.home');
        // } else {
            // return redirect('/login');
        // }
    }

    public function login(){
        if (Auth::check()) {
            return view('templates.dashboard');
        } else {
            return view('auth.login');
        }

    }

    public function register(){
        return view('auth.register');
    }

    public function financeList(){
        return view('dashboard.finance-list');
    }
}
