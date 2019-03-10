@extends('layouts.app')

@section('title', 'About IBDB')

@section('content')
<h1>A component List</h1>

    <div class="d-flex justify-content-center">
        {{ $components->links() }}
    </div>

    @forelse($components as $component)
    <div class="card mb-2">
        <div class="card-header">
            {{ ucfirst(trans($component->name)) }}
        </div>
        <div class="card-body">
            <h5 class="card-title"> Type: {{ ucfirst(trans($component->type)) }}</h5>
            <p class="card-text">{{ $component->info }}</p>

            @include('public.components.partials.buttons')

            <a href="/components/{{ $component->slug }}" class="btn btn-primary btn-sm mr-2 float-right">More Info</a>
      </div>
    </div>
    @empty
      <p>No hay na</p>
    @endforelse

    <div class="d-flex justify-content-center">
        {{ $components->links() }}
    </div>
@endsection
