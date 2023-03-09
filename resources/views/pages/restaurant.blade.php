@extends('layouts.main-layout')

@section('content')

  <div class="container pt-5">
    <h1>
      Your restaurant: {{$restaurant->business_name }}
    </h1>

    <h2>
        <a href="{{ route('dishCreate') }}">Create new dish</a>
    </h2>

    <h3>
        Your dishes: 
    </h3>
    <div class="row">
      @foreach($dishes as $dish)
        @if ($dish->restaurant_id === $restaurant->id)
          <div class="col-md-4">

            <div class="card">

              {{-- img caricamento --}}
              <img src="{{ Vite::asset('storage/app/public/' . $dish -> image) }}" alt="{{ $dish -> name }}">

              <div class="card-body">
                <h5 class="card-title">{{ $dish->name }}</h5>
                <p class="card-text">{{ $dish->description }}</p>
                <p class="card-text">{{ $dish->price }} &euro;</p>
              </div>

              {{-- delete / edit --}}
              <div>
                <a href="{{ route('dish.delete', $dish) }}">ELIMINA</a>
                <a href="{{ route('dishEdit', $dish) }}">EDIT</a>
              </div>
            </div>

          </div>
        @endif
      @endforeach
    </div>
  </div>

@endsection