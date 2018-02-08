<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
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
        return view('admin.dashboard');
    }

    public function userList() {
        return view('admin.users.list');
    }

    public function userSingle() {
        return view('admin.users.single');
    }

    public function userDelete() {
        return view('admin.users.single');
    }
}
