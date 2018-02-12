<?php

namespace App\Http\Controllers\Admin;

use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends AdminController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct('data');
    }

    /*
    // GET /admin/data
    public function list(Request $request) {
        $view = parent::list($request);

        return $view;
    }

    // GET /admin/data/new
    public function new(Request $request) {
        $view = parent::new($request);

        return $view;
    }

    // POST /admin/data/create
    public function create(Request $request) {
        $view = parent::create($request);

        return $view;
    }

    // GET /admin/data/view
    public function single(Request $request) {
        $view = parent::single($request);

        return $view;
    }

    // POST /admin/data/update
    public function update(Request $request) {
        $view = parent::update($request);

        return $view;
    }

    // DELETE /admin/data/delete
    public function delete(Request $request) {
        $view = parent::delete($request);

        return $view;
    }
    */

    public static function getTableHeaders() {
        return array(
            'id'            => 'ID',
            'created_at'    => 'Created',
        );
    }
}
