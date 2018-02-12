<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class UserController extends AdminController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct('user');
    }

    /*
    // GET /admin/users
    public function list(Request $request) {
        $view = parent::list($request);

        return $view;
    }

    // GET /admin/users/new
    public function new(Request $request) {
        $view = parent::new($request);

        return $view;
    }

    // POST /admin/users/create
    public function create(Request $request) {
        $view = parent::create($request);
        $newPassword = Hash::make($request->newPassword);

        return $view;
    }

    // GET /admin/users/view
    public function single(Request $request) {
        $view = parent::single($request);

        return $view;
    }

    // POST /admin/users/update
    public function update(Request $request) {
        $view = parent::update($request);

        return $view;
    }

    // DELETE /admin/users/delete
    public function delete(Request $request) {
        $view = parent::delete($request);

        return $view;
    }
    */

    public static function getTableHeaders() {
        return array(
            'id'            => 'ID',
            'email'         => 'Email Address',
            'first_name'    => 'First Name',
            'last_name'    => 'Last Name',
            'created_at'    => 'Created',
        );
    }
}

