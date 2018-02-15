<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
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

        $this->config['listHeaders'] = [
            'email'         => 'Email Address',
            'first_name'    => 'First Name',
            'last_name'     => 'Last Name',
            'created_at'    => 'Created',
            'roles'         => 'Role(s)',
        ];
    }

    public function single(Request $request, $id) {
        return view('admin.user.single')
            ->with('modelSlug', $this->modelSlug)
            ->with('model', User::findOrFail($id));
    }
}

