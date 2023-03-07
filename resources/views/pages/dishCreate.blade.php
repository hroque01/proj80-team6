@extends('layouts.main-layout')

@section('content')

    <div class="container pt-5">
        <h1>
            Create new dish
        </h1>

        <div class="col-md-8">

            <form method="POST" action="{{ route('dishStore') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-5 row">
                    <label for="name" class="col-md-2 col-form-label text-md-right">Name</label>
                    <div class="col-md-5">
                        <input type="text" name="name" class="form-control">
                    </div>
                </div>

                <div class="mb-5 row">
                    <label for="description" class="col-md-2 col-form-label text-md-right">Description</label>
                    <div class="col-md-5">
                        <input type="text" name="description" class="form-control">
                    </div>
                </div>

                <div class="mb-5 row">
                    <label for="ingredients" class="col-md-2 col-form-label text-md-right">Ingredients</label>
                    <div class="col-md-5">
                        <textarea name="ingredients" class="form-control"></textarea>
                    </div>
                </div>
                
                <div class="mb-5 row">
                    <label for="price" class="col-md-2 col-form-label text-md-right">Price</label>
                    <div class="col-md-5">
                        <input type="number" step=".01" name="price" class="form-control">
                    </div>
                </div>

                <div class="mb-5 row">
                    <label for="photo" class="col-md-2 col-form-label text-md-right">Photo</label>
                    <div class="col-md-5">
                        <input type="file" step=".01" name="photo" class="form-control">
                    </div>
                </div>

                
                <div class="mb-5 row mb-0">
                    <div class="col-md-5 offset-md-4">
                        <input type="submit" value="CREATE" class="btn btn-primary">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection