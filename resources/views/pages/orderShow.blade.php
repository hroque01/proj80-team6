@extends('layouts.app')

@section('content')

  <div class="orderWrapper my_container pt-5">
    
    <div class="card p-5">
        <h1>Ordine #{{$order-> order_number}}</h1>

        <div class="orders">
            <div class="sx-order"> Data e ora ordine:</div>
            <div>{{$order-> create_date}} - {{substr($order-> create_time, 0, -3)}}</div> 
        </div>
        <div class="orders">
            <div class="sx-order">Nome cliente:</div>
            <div>{{$order-> customer_name}}</div>
        </div>
        <div class="orders">
            <div class="sx-order">Indirizzo cliente:</div>
            <div class="address_user">{{$order-> address}}</div>
        </div>
        <div class="orders">
            <div class="sx-order">Indirizzo email cliente:</div>
            <div class="email_user">{{$order-> email}}</div>
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