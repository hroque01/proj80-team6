@extends('layouts.header')

@section('content')

  <div class="my_container pt-5">
 
    <div class="show-dish">

        
      {{-- img caricamento --}}
      <img class="img-res-hub" src="{{ Vite::asset('storage/app/public/' . $dish -> image) }}" alt="{{ $dish -> name }}" onerror="this.onerror=null; this.src='{{$dish->image}}';">
         
        
      <div class="text-card">
          <div class="card-body body-crud">
              <h1 class="card-title">{{ $dish->name }}</h1>

              <div class="show-text">
                <p>Descrizione: {{$dish-> description}}</p>
                <p>Ingredienti: {{$dish-> ingredients}}</p>
              </div>
              <span>Prezzo: {{$dish-> price}} &euro;</p>
          </div>

          <a class="link-back" href="/restaurant">Torna al men&ugrave;</a>
      </div>
          
    </div>
       
  </div>

@endsection