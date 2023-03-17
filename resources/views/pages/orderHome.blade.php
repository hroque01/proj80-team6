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
        <th>Stato Ordine</th>
        <th>Info Ordine</th>
      </thead>

      <tbody>
        @foreach ($orders as $order)
          @if($order->restaurant_id === $restaurant->id)

            <tr>
              <td>{{$order ->create_date}}</td>
              <td>{{$order ->order_number}}</td>
              <td>{{$order ->customer_name}}</td>
              <td>{{$order ->address}}</td>
              <td class="text-center ">
                <span class="rounded p-2 text-light {{ $order->completed === 1 ? 'bg-success' : 'bg-danger' }}">
                  {{ $order->completed == 0 ? 'Failed' : 'Done' }}
                </span>
              </td>
              <td class="text-center">
                <a class="bg-warning p-2 rounded text-light" href="{{route('order.show', $order)}}">Info</a>
              </td>
            </tr>
            
          @endif
      @endforeach
      </tbody>
     
    </table>
        
    
  </div>

@endsection