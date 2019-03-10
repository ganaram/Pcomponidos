@extends('layouts.app')

@section('title', 'Info')

@section('content')
    <h2>{{ $component->name }}</h2>
    <h4>{{ $component->type }}</h4>
    <h4>{{ str_plural("Brand", $component->brands->count())}}:{{ $component->brands->pluck('name')->implode(', ') }}</h4>
    <p>{{ $component->info }}</p>

    @include('public.components.partials.buttons')
    
@endsection
