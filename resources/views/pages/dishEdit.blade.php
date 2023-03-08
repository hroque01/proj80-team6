@extends('layouts.main-layout')

@section('content')

    <div class="container pt-5">
        <h1>
            Update dish
        </h1>

        <form method="POST" action="" enctype="multipart/form-data">
        @csrf

            <div class="mb-5 row">
                <label for="name" class="col-md-2 col-form-label text-md-right">Name</label>
                <div class="col-md-5">
                    <input type="text" name="name" class="form-control" value="{{$dish -> name}}">
                </div>
            </div>

            <div class="mb-5 row">
                <label for="description" class="col-md-2 col-form-label text-md-right">Description</label>
                <div class="col-md-5">
                    <input type="text" name="description" class="form-control" value="{{$dish -> description}}">
                </div>
            </div>

            <div class="mb-5 row">
                <label for="ingredients" class="col-md-2 col-form-label text-md-right">Ingredients</label>
                <div class="col-md-5">
                    <textarea name="ingredients" class="form-control" value="{{$dish -> ingredients}}"></textarea>
                </div>
            </div>
            
            <div class="mb-5 row">
                <label for="price" class="col-md-2 col-form-label text-md-right">Price</label>
                <div class="col-md-5">
                    <input type="number" step=".01" name="price" class="form-control" value="{{$dish -> price}}">
                </div>
            </div>

            <div class="mb-5 row">
                <label for="image" class="col-md-2 col-form-label text-md-right">Photo</label>
                <div class="col-md-5">
                    <input type="file" name="image" class="form-control" value="{{$dish -> image}}">
                </div>
            </div>

            <div class="col-md-3">
                <select name="restaurant_id">
                    @foreach ($restaurants as $restaurant)
                        <option value="{{ $restaurant -> id }}"
                            @if ($dish -> restaurant -> id === $restaurant -> id)
                                selected
                            @endif
                            >{{ $restaurant->user -> business_name }}</option>    
                    @endforeach
                </select>
            </div>

            
            <div class="mb-5 row mb-0">
                <div class="col-md-5 offset-md-4">
                    <input type="submit" value="UPDATE" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>

@endsection