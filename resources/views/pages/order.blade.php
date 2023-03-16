@extends('layouts.header')

@section('content')

      {{-- ciclo foreach per stampare lista di piatti --}}
      <ul>
        @foreach($orders as $order)


            {{-- img caricate--}}
            <li>
                {{ $order->customer_name }} - {{ $order->address}}
            </li>
           
      @endforeach
      </ul>
  </div>

@endsection