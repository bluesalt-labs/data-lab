@extends('layouts.admin')

@section('page-title', 'Apps')

@section('page-content')
    @component('admin.layouts.table')
        @slot('headers', $headers)
        @slot('data', $data)
    @endcomponent
@endsection