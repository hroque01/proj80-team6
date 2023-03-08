@extends('layouts.main-layout')

@section('content')

  <div class="container pt-5">
    <h1>
      Your restaurant: {{Auth::user()->business_name}}
    </h1>

    <h2>
        <a href="{{ route('dishCreate') }}">Create new dish</a>
    </h2>

    <h3>
        Your dishes: 
    </h3>
    <div class="row">
      @foreach($dishes as $dish)
        <div class="col-md-4">

          <div class="card">

            {{-- img caricamento --}}
            <img class="card-img-top" src="{{ asset($dish->image) }}" alt="{{ $dish->name }}">
            <img src="{{ asset('storage/' . $dish -> image) }}" alt="">

            <div class="card-body">
              <h5 class="card-title">{{ $dish->name }}</h5>
              <p class="card-text">{{ $dish->description }}</p>
              <p class="card-text">{{ $dish->price }} €</p>
            </div>

            {{-- delete --}}
            <div>
              <a href="{{ route('dish.delete', $dish) }}">ELIMINA</a>
              <a href="{{ route('dishEdit', $dish) }}">UPDATE</a>
            </div>
          </div>

        </div>
      @endforeach
    </div>
  </div>

@endsection