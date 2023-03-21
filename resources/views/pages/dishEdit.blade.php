@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8 edit-crud">

                <div class="card">

                    {{-- logo --}}
                    <div class="card-header header-form">
                        <img src="{{Vite::asset('resources/img/logo.png')}}" alt="logo" class="logo-form">
                    </div>

                    <div class="card-body">
                        <h5 class="mt-3 mb-5">{{$dish->name}}</h5>

                        <form method="POST" action="{{ route('dishUpdate', $dish) }}" enctype="multipart/form-data">
                            @csrf
                
                            <div class="mb-4 row">
                                <label for="name" class="col-md-3 col-form-label text-md-right star">Nome del piatto</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" value="{{$dish -> name}}" required>
                                </div>
                            </div>
                
                            <div class="mb-4 row">
                                <label for="description" class="col-md-3 col-form-label text-md-right">Descrizione</label>
                                <div class="col-md-6">
                                    <textarea type="text" name="description" class="form-control" required></textarea>
                                </div>
                            </div>
                
                            <div class="mb-4 row">
                                <label for="ingredients" class="col-md-3 col-form-label text-md-right star">Ingredienti</label>
                                <div class="col-md-6">
                                    <input type="text" name="ingredients" class="form-control" value="{{$dish -> ingredients}}" required>
                                </div>
                            </div>
                            
                            <div class="mb-4 row">
                                <label for="price" class="col-md-3 col-form-label text-md-right star">Prezzo</label>
                                <div class="col-md-6">
                                    <input type="number" step=".01" name="price" class="form-control" value="{{$dish -> price}}" required>
                                </div>
                            </div>
                
                            <div class="mb-4 row">
                                <label for="image" class="col-md-3 col-form-label text-md-right star">Immagine</label>
                                <div class="col-md-6">
                                    <input type="file" name="image" class="form-control" value="{{$dish -> image}}" required>
                                </div>
                            </div>
                
                            <div class="mb-5 row">
                                <div class="col-md-6">
                                    <p>
                                        Vuoi che il piatto sia visibile nel men&ugrave;&quest;
                                    </p>
                                    <input type="radio" id="scelta1" name="visible" value="1" 
                                    @if ($dish->visible)
                                        checked
                                    @endif
                                    >
                                    <label for="1">Si</label>
                
                                    <input type="radio" id="scelta2" name="visible" value="0"
                                    @if (!$dish->visible)
                                        checked
                                    @endif
                                    >
                                    <label for="0">No</label>
                                </div>
                            </div>
                
                            <div class="mb-5 row mb-0">
                                <div class="col-md-5 offset-md-4">
                                    <input type="submit" value="Modifica" class="btn">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        

        
    </div>

@endsection