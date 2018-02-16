@extends('layouts.admin')

@section('page-title', 'Role: '.$model->name)

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
                <div class="col-md-6 col-8">
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
                <div class="col-md-6 col-8">
                    <label for="permissions[]">Permission</label>
                </div>
                <div class="col-2">
                    <label for="permissions[]">Has Access?</label>
                </div>
                <div class="col-2"></div>
            </div>
            @foreach($model->permissions as $key => $val)
                <div class="row">
                    <div class="form-group col-md-6 col-8">
                        <input type="text" class="form-control" name="permissions[]" value="{{ $key }}" />
                    </div>
                    <div class="form-group col-2">
                        <span class="switch">
                            <input type="checkbox"
                                   class="switch"
                                   id="permissions[]"
                                   @if($val === true) checked value="true" @endif
                                   @if(Auth::user()->role === 'system_admin') disabled @endif>
                            <label for="permissions[]">{{ Auth::user()->role }}</label>
                        </span>
                    </div>
                    <div class="col-2">
                        <a href="#" role="button" onclick="" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </form>
    </div>
@endsection