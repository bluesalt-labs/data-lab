<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    protected $modelSlug;
    protected $modelClass;
    //protected $controllerClass;
    protected $config;

    /**
     * AdminController constructor.
     * @param string|null $modelSlug
     */
    public function __construct($modelSlug = null) {
        $this->middleware('auth');

        $this->modelSlug = strtolower(trim($modelSlug));
        $this->modelClass = '\App\Models\\'.ucfirst($this->modelSlug);
        //$this->controllerClass = '\App\Http\Controllers\Admin\\'.ucfirst($this->modelSlug).'Controller';
        $this->config = $this->getConfig();

        // Gate Middleware Definitions
        if($this->modelSlug) {
            $this->middleware('can:'.$this->modelSlug.'-create')->only(['new', 'create']);
            $this->middleware('can:'.$this->modelSlug.'-read')->only(['list', 'single']);
            $this->middleware('can:'.$this->modelSlug.'-update')->only('update');
            $this->middleware('can:'.$this->modelSlug.'-delete')->only('delete');
        }
    }

    private function getConfig() {
        return [
            'listHeaders'   => [
                'id'            => 'ID',
                'name'          => 'Name',
                'created_at'    => 'Created',
            ],
            'editButton'    => [
                'enabled'       => true,
                'content'       => 'Edit',
                'class'         => 'btn btn-info',
            ],
        ];
    }

    // GET /admin/{modelSlug}
    public function list(Request $request) {
        $data = $this->modelClass::all();

        //return view('admin.'.$this->modelSlug.'.list')
        return view('admin.layouts.list')
            ->with('modelSlug', $this->modelSlug)
            ->with('headers', $this->config['listHeaders'])
            ->with('editButton', $this->config['editButton'])
            ->with('data', $data);
    }

    // GET /admin/{modelSlug}/{id}
    public function single(Request $request, $id) {
        $model = $this->modelClass::findOrFail( intval($id) );

        //return view('admin.'.$this->modelSlug.'.single');
        return view('admin.layouts.single')
            ->with('modelSlug', $this->modelSlug)
            ->with('model', $model);
    }

    // GET /admin/{modelSlug}/new
    public function new(Request $request) {
        return view('admin.'.$this->modelSlug.'.new');
    }

    // POST /admin/{modelSlug}/create
    public function create(Request $request) {
        return view('admin.'.$this->modelSlug.'.create');
        //return redirect('');
    }


    // POST /admin/{modelSlug}/update
    public function update(Request $request) {

    }

    // DELETE /admin/{modelSlug}/delete
    public function delete(Request $request) {
        //return redirect('');
    }
}



/*
    // GET /admin/apps
    public function list(Request $request) {
        $view = parent::list($request);

        return $view;
    }

    // GET /admin/apps/{id}
    public function single(Request $request) {
        $view = parent::single($request);

        return $view;
    }

    // GET /admin/apps/new
    public function new(Request $request) {
        $view = parent::new($request);

        return $view;
    }

    // POST /admin/apps/create
    public function create(Request $request) {
        $view = parent::create($request);

        return $view;
    }

    // POST /admin/apps/update
    public function update(Request $request) {
        $view = parent::update($request);

        return $view;
    }

    // DELETE /admin/apps/delete
    public function delete(Request $request) {
        $view = parent::delete($request);

        return $view;
    }
    */