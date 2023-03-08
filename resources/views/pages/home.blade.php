@extends('layouts.main-layout')

@section('content')

  <div class="container pt-5">
    <h1>
      Your restaurant: {{$restaurant->business_name }}
      {{-- {{Auth::user()->business_name}} --}}
    </h1>

    @foreach ($restaurants as $restaurant)
       {{ $restaurant->user_id}}
    @endforeach
    <br>

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
            <img src="{{ Vite::asset('storage/app/public/' . $dish -> image) }}" alt="{{ $dish -> name }}">
            <img class="card-img-top" src="{{ asset($dish->image) }}" alt="{{ $dish->name }}">

            <div class="card-body">
              <h5 class="card-title">{{ $dish->name }}</h5>
              <p class="card-text">{{ $dish->description }}</p>
              <p class="card-text">{{ $dish->price }} €</p>
            </div>

            {{-- delete --}}
            <div>
              <a href="{{ route('dish.delete', $dish) }}">ELIMINA</a>
              <a href="{{ route('dishEdit', $dish) }}">EDIT</a>
            </div>
          </div>

        </div>
      @endforeach
    </div>
  </div>

@endsection