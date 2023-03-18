@extends('layouts.app')

@section('content')

  <div class="my_container pt-5">
      
    <h1 class="mb-4">Lista ordini</h1>
    <table class="table">

      <thead>
        <th>Data Ordine</th>
        <th>Numero ordine</th>
        <th>Nome Cliente</th>
        <th>Totale Ordine</th>
        <th class="text-center">Stato Ordine</th>
        <th></th>
      </thead>

      <tbody>
        @foreach ($orders as $order)
          @if($order->restaurant_id === $restaurant->id)

            <tr>
              <td>{{$order ->create_date}}</td>
              <td>{{$order ->order_number}}</td>
              <td>{{$order ->customer_name}}</td>
              <td>{{$order ->total}}&euro;</td>
              <td class="">
                <span class="d-block text-center rounded p-2 text-light {{ $order->completed === 1 ? 'bg-success' : 'bg-danger' }}">
                  {{ $order->completed == 0 ? 'Rifiutato' : 'Completato' }}
                </span>
              </td>
              <td class="text-center">
                <a class="d-block bg-warning p-2 rounded text-light" href="{{route('order.show', $order)}}">Info</a>
              </td>
            </tr>
            
          @endif
      @endforeach
      </tbody>
     
    </table>
        
    
  </div>

@endsection