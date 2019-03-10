@extends('layouts.app')

@section('title', 'Create Computer')

@section('content')
<h1>Create Computer</h1>
<form action="/computers" method="post" enctype="multipart/form-data" novalidate>
    @csrf

    @include('public.computers.partials.form')

    <button type="submit" class="btn btn-primary">Create!</button>
</form>
@endsection
