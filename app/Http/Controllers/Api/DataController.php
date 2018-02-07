<?php

namespace App\Http\Controllers\Api;

use App\Data;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {

    }

    public function index(Request $request) {
        $data = Data::all();

        return response()->json($data);
    }

    public function getByID(Request $request, $id) {
        $data = Data::find($id);

        return response()->json($data);
    }

    public function create(Request $request) {
        echo json_encode($request);die;
    }

    public function update(Request $request, $id) {
        echo json_encode($request);die;
    }

    public function delete(Request $request, $id) {
        echo json_encode($request);die;
    }
}
