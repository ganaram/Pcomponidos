@extends('layouts.app')

@section('title', 'Computer Info!')

@section('content')
    <div class="row">
        <div class="col">
                <h2>{{ $computer->title }}</h2>
                <h4>{{ str_plural("Components", $computer->components->count())}}: {{ $computer->components->pluck('name')->implode(', ') }}</h4>
                <h4>Price: {{ $computer->price . " €"}}</h4>
                <hr>
                <h3>Description:</h3>
                <p>{{ $computer->description }}</p>
                
                @include('public.computers.partials.buttons')
        </div>
    </div>
    

@endsection
