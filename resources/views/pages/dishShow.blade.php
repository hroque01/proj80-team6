@extends('layouts.header')

@section('content')

  <div class="container pt-5">
 
    <div class="show-dish">

        
        {{-- img caricamento --}}
        <img src="{{ Vite::asset('storage/app/public/' . $dish -> image) }}" alt="{{ $dish -> name }}">
        
        <div class="text-card">
            <div class="card-body body-crud">
                <h1 class="card-title">{{ $dish->name }}</h1>

                <div class="show-text">
                    <p>{{$dish-> description}}</p>
                    <p>Ingredienti: {{$dish-> ingredients}}</p>
                    
                </div>
                <span>{{$dish-> price}} &euro;</p>
            </div>

            <a class="link-back" href="/restaurant">Torna al men&uacute;</a>
        </div>
          
    </div>
       
  </div>

@endsection