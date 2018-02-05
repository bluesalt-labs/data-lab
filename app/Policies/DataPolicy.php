<?php

namespace App\Policies;

use App\User;
use App\Data;

class DataPolicy
{
    /**
     * Determine if the given data can be viewed by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Data  $data
     * @return bool
     */
    public function getByID(User $user, Data $data) {
        return $user->id === $data->user_id;
    }

    /**
     * Determine if the given data can be updated by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Data  $data
     * @return bool
     */
    public function update(User $user, Data $data) {
        return $user->id === $data->user_id;
    }
}

/*
 *
 * public function index(Request $request) {
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
 */