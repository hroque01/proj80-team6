@extends('layouts.header')

@section('content')

  <div class="my_container res-hub-txt pt-5">

    <h1>
      Ciao, <span class="res-hub-welcome">{{$restaurant->business_name }}</span>!
    </h1>

    <h4>
      Qui puoi visualizzare il men&ugrave; completo del tuo ristorante con la lista dei tuoi piatti
    </h4>

    <h5>
      <a class="create-crud" href="{{ route('dishCreate') }}"> &plus; Aggiungi un nuovo piatto al tuo men&ugrave; e attira sempre pi&ugrave; clienti! Cosa aspetti?</a>
    </h5>
    
    <div class="cards-res-hub">

      {{-- ciclo foreach per stampare lista di piatti --}}
      @foreach($dishes as $dish)
        @if ($dish->restaurant_id === $restaurant->id)

          <div class="card card_crud">

            {{-- img caricate--}}
            <img class="img-res-hub" src="{{ Vite::asset('storage/app/public/' . $dish -> image) }}" alt="{{ $dish -> name }}" onerror="this.onerror=null; this.src='{{$dish->image}}';">
         
            {{-- show --}}
            <div class="card-body body-crud">
              <h5 class="card-title">{{ $dish->name }}</h5>
              <a class="link-show" href="{{ route('dish.show', $dish) }}">Clicca qui per visualizzare il piatto</a>
            </div>

            {{-- delete / edit --}}
            <div>
              <a class="btn-crud" href="{{ route('dish.delete', $dish) }}">Elimina</a>
              <a class="btn-crud" href="{{ route('dishEdit', $dish) }}">Modifica</a>
            </div>
      
          </div>
           
        @endif
      @endforeach
    </div>
  </div>

@endsection