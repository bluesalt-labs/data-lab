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

        // Gate Middleware Definitions
        $this->middleware('can:dashboard')->only('index');

        $this->middleware('can:users-create')->only(['userNew', 'userCreate']);
        $this->middleware('can:users-read')->only(['userList', 'userSingle']);
        $this->middleware('can:users-update')->only('userUpdate');
        $this->middleware('can:users-delete')->only('userDelete');

        $this->middleware('can:role-create')->only(['roleNew', 'userCreate']);
        $this->middleware('can:role-read')->only(['roleList', 'roleSingle']);
        $this->middleware('can:role-update')->only('roleUpdate');
        $this->middleware('can:role-delete')->only('roleDelete');

        $this->middleware('can:app-create')->only(['appNew', 'appCreate']);
        $this->middleware('can:app-read')->only(['appList', 'appSingle']);
        $this->middleware('can:app-update')->only('appUpdate');
        $this->middleware('can:app-delete')->only('appDelete');

        $this->middleware('can:data-create')->only(['dataNew', 'dataCreate']);
        $this->middleware('can:data-read')->only(['dataList', 'dataSingle']);
        $this->middleware('can:data-update')->only('dataUpdate');
        $this->middleware('can:data-delete')->only('dataDelete');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('admin.dashboard');
    }

    //========== User Views ==========//

    // GET /admin/users/index
    public function userList(Request $request) {
        return view('admin.user.list');
    }

    // GET /admin/users/new
    public function userNew(Request $request) {
        return view('admin.user.list');
    }

    // POST /admin/users/create
    public function userCreate(Request $request) {
        return redirect('');
    }

    // GET /admin/users/view/{id}
    public function userSingle(Request $request) {
        return view('admin.user.single')->with(['user_id' => $request->get('user_id')]);
    }

    // POST /admin/users/update
    public function userUpdate(Request $request) {
        return redirect('');
    }

    // DELETE /admin/users/delete
    public function userDelete(Request $request) {
        return view('admin.user.single');
    }

    //================================//


    //========== App Views ===========//

    // GET /admin/users/index
    public function appList(Request $request) {
        return view('admin.app.list');
    }

    // GET /admin/users/new
    public function appNew(Request $request) {
        return view('admin.app.list');
    }

    // POST /admin/users/create
    public function appCreate(Request $request) {
        return redirect('');
    }

    // GET /admin/users/view/{id}
    public function appSingle(Request $request) {
        return view('admin.app.single')->with(['user_id' => $request->get('user_id')]);
    }

    // POST /admin/users/update
    public function appUpdate(Request $request) {
        return redirect('');
    }

    // DELETE /admin/users/delete
    public function appDelete(Request $request) {
        return view('admin.app.single');
    }

    //================================//


    //========== Data Views ===========//

    // GET /admin/users/index
    public function dataList(Request $request) {
        return view('admin.data.list');
    }

    // GET /admin/users/new
    public function dataNew(Request $request) {
        return view('admin.data.list');
    }

    // POST /admin/users/create
    public function dataCreate(Request $request) {
        return redirect('');
    }

    // GET /admin/users/view/{id}
    public function dataSingle(Request $request) {
        return view('admin.data.single')->with(['user_id' => $request->get('user_id')]);
    }

    // POST /admin/users/update
    public function dataUpdate(Request $request) {
        return redirect('');
    }

    // DELETE /admin/users/delete
    public function dataDelete(Request $request) {
        return view('admin.data.single');
    }

    //================================//

    //========== Role Views ===========//

    // GET /admin/users/index
    public function roleList(Request $request) {
        return view('admin.role.list');
    }

    // GET /admin/users/new
    public function roleNew(Request $request) {
        return view('admin.role.list');
    }

    // POST /admin/users/create
    public function roleCreate(Request $request) {
        return redirect('');
    }

    // GET /admin/users/view/{id}
    public function roleSingle(Request $request) {
        return view('admin.role.single')->with(['user_id' => $request->get('user_id')]);
    }

    // POST /admin/users/update
    public function roleUpdate(Request $request) {
        return redirect('');
    }

    // DELETE /admin/users/delete
    public function roleDelete(Request $request) {
        return view('admin.role.single');
    }

    //================================//
}
