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
}
