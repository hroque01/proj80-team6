@extends('layouts.app')

@section('content')
    <div class="container pt-5">
        @guest
            <h3>
                Registrazione avvenuta con successo!
            </h3>
        @endguest
    </div>

@endsection
