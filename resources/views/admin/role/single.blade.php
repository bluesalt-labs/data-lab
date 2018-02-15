@extends('layouts.admin')

@section('page-title', 'Role {name}')

@section('page-content')
    {{--
    <div class="container">
        <pre><code>
{{ json_encode($model, JSON_PRETTY_PRINT) }}
        </code></pre>
    </div>
    --}}

    <div class="container">
        <form method="post" action="{{ route($modelSlug.'_update') }}">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $model->id }}" />

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" value="{{ $model->name }}" />
                    </div>

                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" id="slug" value="{{ $model->slug }}" readonly />
                    </div>
                </div>
                <div class="col-sm-4"></div>
            </div>

            <h3>Permissions</h3>
            <div class="row">
                <div class="col-xs-6">
                    <label for="permissions[]">Permission</label>
                </div>
                <div class="col-xs-2">
                    <label for="permissions[]">Has Access?</label>
                </div>
                <div class="col-xs-4"></div>
            </div>
            @foreach($model->permissions as $key => $val) <!-- todo: vue?-->
                <div class="row">
                    <div class="form-group col-xs-6">
                        <input type="text" class="form-control" name="permissions[]" value="{{ $key }}" />
                    </div>
                    <div class="form-group col-xs-2">
                        <input type="checkbox" class="form-control" id="permissions[]" @if($val === true) checked value="true" @endif />
                    </div>
                    <div class="col-xs-4">
                        <button onclick="" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </div>
            @endforeach
        </form>
    </div>
@endsection