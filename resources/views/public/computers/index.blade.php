@extends('layouts.app')

@section('title', 'Computers!')

@section('content')
<h1>Computers</h1>

    <div class="d-flex justify-content-center">
        {{ $computers->links() }}
    </div>

    @if(session('message'))
    <div class="alert alert-primary" role="alert">
            {{ session('message') }}
    </div>
    @endif
    
    @forelse($computers as $computer)
    <div class="book-card card mb-2">
            <div class="col-2">
                    <img class="img-fluid" src="{{ $computer->img }}" alt="">
                </div>
        <div class="card-header">
                {{ ucfirst(trans($computer->model)) }}
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <h5 class="card-title">Builder: <a href="{{ route('usercomputers.index', $computer->user->slug) }}" title="{{ $computer->user->name }}'s computer listing.">{{ $computer->user->name }}</a></h5>
                <h5 class="class-title">Price: {{$computer->price}}€</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Components: {{ $computer->components()->pluck('name')->implode(', ') }}</h6>
                    <p class="card-text">{{ str_limit($computer->description, 300) }}</p>

                    @include('public.computers.partials.buttons')

                    <a href="/computers/{{ $computer->slug }}" class="btn btn-primary btn-sm mr-2 float-right">More Info</a>
                </div>
            </div>
      </div>
    </div>
    @empty
      <p>No hay COMPUTADORAS.</p>
    @endforelse

    <div class="d-flex justify-content-center">
        {{ $computers->links() }}
    </div>
@endsection
