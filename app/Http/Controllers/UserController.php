<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userlist(){
        $users = User::all();
        return view('user-list',compact('users'));
    }
    public function dashboard(){
        
        return view('dashboard');
    }
    public function mema(){
        
        return view('mema');
    }
}