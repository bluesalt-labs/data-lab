<?php

namespace App\Http\Controllers\Admin;

use App\Models;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    protected $model_slug;

    /**
     * AdminController constructor.
     * @param string|null $model_slug
     */
    public function __construct($model_slug = null) {
        $this->middleware('auth');

        $this->model_slug = strtolower(trim($model_slug));

        // Gate Middleware Definitions
        if($this->model_slug) {
            $this->middleware('can:'.$this->model_slug.'-create')->only(['new', 'create']);
            $this->middleware('can:'.$this->model_slug.'-read')->only(['list', 'single']);
            $this->middleware('can:'.$this->model_slug.'-update')->only('update');
            $this->middleware('can:'.$this->model_slug.'-delete')->only('delete');
        }
    }

    // GET /admin/{model_slug}
    public function list(Request $request) {
        $modelClass = '\App\Models\\'.ucfirst($this->model_slug);
        $controllerClass = '\App\Http\Controllers\Admin\\'.ucfirst($this->model_slug).'Controller';

        $headers = $controllerClass::getTableHeaders();
        $data = $modelClass::all();

        return view('admin.'.$this->model_slug.'.list')
            ->with('headers', $headers)
            ->with('data', $data);
    }

    // GET /admin/{model_slug}/new
    public function new(Request $request) {
        return view('admin.'.$this->model_slug.'.new');
    }

    // POST /admin/{model_slug}/create
    public function create(Request $request) {
        return view('admin.'.$this->model_slug.'.create');
        //return redirect('');
    }


    // POST /admin/{model_slug}/update
    public function update(Request $request) {

    }

    // DELETE /admin/{model_slug}/delete
    public function delete(Request $request) {
        //return redirect('');
    }

    /**
     * @return array
     * @description Headers for the table in a child controller's list view.
     */
    public static function getTableHeaders() {
        return array(
            'id'            => 'ID',
            'name'          => 'Name',
            'created_at'    => 'Created',
        );
    }
}
