@extends('layouts.app')

@section('title', 'Update Component')

@section('content')
<h1>Edit Component</h1>
<form action="/components/{{ $component->id }}" method="post" novalidate>

    @csrf
    @method('patch')

    @include('public.components.partials.form')

    <button type="submit" class="btn btn-primary">Update Book</button>
</form>
@endsection
