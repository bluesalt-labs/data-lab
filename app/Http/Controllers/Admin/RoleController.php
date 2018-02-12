<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends AdminController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct('role');
    }

    /*
    // GET /admin/roles
    public function list(Request $request) {
        $view = parent::list($request);

        return $view;
    }

    // GET /admin/roles/new
    public function new(Request $request) {
        $view = parent::new($request);

        return $view;
    }

    // POST /admin/roles/create
    public function create(Request $request) {
        $view = parent::create($request);

        return $view;
    }

    // GET /admin/roles/view
    public function single(Request $request) {
        $view = parent::single($request);

        return $view;
    }

    // POST /admin/roles/update
    public function update(Request $request) {
        $view = parent::update($request);

        return $view;
    }

    // DELETE /admin/roles/delete
    public function delete(Request $request) {
        $view = parent::delete($request);

        return $view;
    }
    */

    public static function getTableHeaders() {
        return array(
            'id'            => 'ID',
            'name'          => 'Name',
            'created_at'    => 'Created',
        );
    }
}
