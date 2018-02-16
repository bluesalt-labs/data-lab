@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('page-content')

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>

        <div class="panel-body">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

            <span>Welcome {{ Auth::user()->fullName() }}!</span><br />

            <hr />
            <span>Role(s)</span><br />
            <ul>
                @foreach(Auth::user()->roles as $role)
                <li>{{ $role->name }}</li>
                @endforeach
            </ul>
            <hr />

            <div class="passport-components">
                <passport-clients></passport-clients>
                <hr />
                <passport-authorized-clients></passport-authorized-clients>
                <hr />
                <passport-personal-access-tokens></passport-personal-access-tokens>
            </div>
        </div>
    </div>
</div>
@endsection
