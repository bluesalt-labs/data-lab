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

        unset($this->config['listHeaders']['id']);
    }

    public function single(Request $request, $id) {
        return view('admin.role.single')
            ->with('modelSlug', $this->modelSlug)
            ->with('model', Role::findOrFail($id));
    }
}
