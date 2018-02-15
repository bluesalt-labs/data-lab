@extends('layouts.admin')

@section('page-title', 'User {Name}')

@section('page-content')
    {{--
    <div class="container">
        <pre><code>
{{ json_encode($data, JSON_PRETTY_PRINT) }}
        </code></pre>
    </div>
    --}}


    <div class="container">
        <form method="post" action="{{ route($modelSlug.'_update') }}">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $model->id }}" />

            <div class="row">
                <div class="col-sm-10">
                    <div class="form-group col-sm-5">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" value="{{ $model->first_name }}" />
                    </div>
                    <div class="form-group col-sm-5">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" value="{{ $model->last_name }}" />
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="form-group col-sm-10">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" value="{{ $model->email }}" />
                    </div>
                </div>
            </div>

            <h3>Role(s)</h3>
            <div class="row">
                @foreach($model->roles as $role)
                <div class="col-sm-3 col-xs-6">
                    <a type="button" class="btn btn-primary"
                       href="{{ route('role_view', [ 'id' => $role->id] ) }}"
                       target="_blank">
                        {{ $role->name }}
                    </a>
                </div>
                <div class="col-sm-1 col-xs-6">
                    <button onclick="#" class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
                <div class="clearfix">
                </div>
                <div class="col-sm-4 col-xs-12">
                    <hr />
                </div>
                <div class="clearfix"></div>
                @endforeach

                <div class="col-sm-3 col-xs-6">
                    <select class="form-control" id="new-role">
                        <option selected>Add Role...</option>
                        @foreach(Role::)
                    </select>
                </div>
                <div class="col-sm-1 col-xs-6">
                    <button onclick="#" class="btn btn-success">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
                <div class="clearfix"></div>
            </div>
        </form>
    </div>
@endsection