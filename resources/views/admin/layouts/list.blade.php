@extends('layouts.admin')

@section('page-title', ucfirst($modelSlug) )

@section('page-content')
<div class="container">
    @component('admin.layouts.table')
        @slot('modelSlug', $modelSlug)
        @slot('headers', $headers)
        @slot('editButton', $editButton)
        @slot('data', $data)
    @endcomponent
</div>
@endsection