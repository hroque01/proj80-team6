@extends('layouts.header')

@section('content')

  <div class="container pt-5">
    <h1>
      Ciao, <span class="res-hub-welcome">{{$restaurant->business_name }}</span>! Benvenuto nel Restaurant Hub.
    </h1>

    <h2>
        <a href="{{ route('dishCreate') }}">Crea un nuovo piatto</a>
    </h2>

    <h3>
        I tuoi piatti: 
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