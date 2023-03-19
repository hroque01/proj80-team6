@extends('layouts.app')

@section('content')

  <div class="my_container pt-5">
    
    <div class="card p-5">
        <h1>Ordine #{{$order-> order_number}}</h1>

        <div class="orders">
            <div class="sx-order"> Data e ora ordine:</div>
            <div>{{$order-> create_date}} - {{$order-> create_time}}</div>
        </div>
        <div class="orders">
            <div class="sx-order">Nome cliente:</div>
            <div>{{$order-> customer_name}}</div>
        </div>
        <div class="orders">
            <div class="sx-order">Indirizzo cliente:</div>
            <div>{{$order-> address}}</div>
        </div>
        <div class="orders">
            <div class="sx-order">Indirizzo email cliente:</div>
            <div>{{$order-> email}}</div>
        </div>
        <div class="orders">
            <div class="sx-order">Telefono cliente:</div>
            <div>{{$order-> phone_number}}</div>
        </div>
        <div class="orders">
            <div class="sx-order">Totale ordine:</div>
            <div class="total-order bg-danger text-light">{{$order-> total}}&euro;</div>
        </div>

        <a class="mt-5" href="{{route('order.home')}}">Torna alla lista degli ordini</a>
      </div>

      
    </div>
   

@endsection