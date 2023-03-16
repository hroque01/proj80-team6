@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card create-crud">

                    {{-- logo --}}
                    <div class="card-header header-form">
                        <img src="{{Vite::asset('resources/img/logo.png')}}" alt="logo" class="logo-form">
                    </div>

                    <div class="card-body">
                        <h5 class="mt-3 mb-5">Aggiungi un nuovo ordine</h5>

                        {{-- form --}}
                        <form method="POST" action="{{ route('orderStore') }}">

                            @csrf
                            <div class="mb-4 row">
                                <label for="customer_name" class="star col-md-3 col-form-label text-md-right">Nome </label>
                                <div class="col-md-6">
                                    <input type="text" name="customer_name" class="form-control" placeholder="Spaghetti alle vongole" required>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="total" class="star col-md-3 col-form-label text-md-right">totale</label>
                                <div class="col-md-6">
                                    <input type="number" step=".01" name="total" class="form-control" required>
                                </div>
                            </div>
                            
                            

                            <div class="mb-4 row">
                                <label for="address" class="star col-md-3 col-form-label text-md-right">INDIRIZZO</label>
                                <div class="col-md-6">
                                    <input type="text" name="address" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="mb-4 row">
                                <label for="email" class="star col-md-3 col-form-label text-md-right">EMAIL</label>
                                <div class="col-md-6">
                                    <input type="email"  name="email" class="form-control" required>
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="phone_number" class="star col-md-3 col-form-label text-md-right">TEL</label>
                                <div class="col-md-6">
                                    <input type="text" name="phone_number" class="form-control" required>
                                </div>
                            </div>

                            <div class="mb-4 row mt-5">
                                <div class="col-md-6 offset-md-4">
                                    <input type="submit" value="Aggiungi" class="btn">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        

            

    </div>   

@endsection