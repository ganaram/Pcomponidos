@extends('layouts.app')

@section('title', 'Info')

@section('content')
    <h2>{{ $component->name }}</h2>
    <h4>{{ $component->type }}</h4>
    <p>{{ $component->info }}</p>

    @include('public.components.partials.buttons')
    
@endsection
