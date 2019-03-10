@extends('layouts.app')

@section('title', 'Update computer')

@section('content')
<h1>Edit the computer</h1>
<form action="/computers/{{ $computer->id }}" method="post" enctype="multipart/form-data" novalidate>

    @csrf
    @method('patch')

    @include('public.computers.partials.form')

    <button type="submit" class="btn btn-primary">Edit it!</button>
</form>
@endsection
