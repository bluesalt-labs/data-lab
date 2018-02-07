<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {

    }

    public function index(Request $request) {

    }

    public function getByID(Request $request, $id) {

    }

    public function create(Request $request) {
        //Hash::make($request->newPassword);
    }

    public function update(Request $request, $id) {

    }

    public function delete(Request $request, $id) {

    }
}
