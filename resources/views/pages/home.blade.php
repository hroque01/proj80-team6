@extends('layouts.main-layout')

@section('content')

  <div class="container pt-5">
    <h1 class="pb-3">
      Typologies
    </h1>
  
    @foreach ($typologies as $typology)
          <h2>{{ $typology -> name }}</h2>
          
          <ul>
              @foreach ($typology -> restaurants as $restaurant)
                <li>
                  {{ $restaurant -> business_name }}
                </li>
              @endforeach
          </ul>
      @endforeach
  </div>

@endsection