@extends('layouts.app')

@section('title', 'New Component!')

@section('content')
<h1>Add a New Component</h1>
<form action="/components" method="post" enctype="multipart/form-data" novalidate>
    @csrf

    @include('public.components.partials.form')

    <button type="submit" class="btn btn-primary">Save Component</button>
</form>
@endsection
