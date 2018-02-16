@extends('layouts.docs')

@section('page-content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <h1 class="panel-heading">Docs Home</h1>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <span>#todo</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
