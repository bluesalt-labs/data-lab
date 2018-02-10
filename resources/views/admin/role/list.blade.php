@extends('layouts.admin')

@section('page-title', 'Roles')

@section('page-content')
@if($roles)
<pre><code>
{{ json_encode($roles, JSON_PRETTY_PRINT) }}
</code></pre>
@endif
@endsection