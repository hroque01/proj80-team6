@extends('layouts.app')
@section('content')

<div class="container">
    <ul>
        @foreach ($typologies as $typology)
            <h1>
                {{$typology->name}}
            </h1>

            <ul>
                @foreach ($typology -> restaurants as $restaurant)
                    <li>
                        {{ $restaurant -> user -> business_name}}
                    </li>
                @endforeach
            </ul>
        @endforeach
    </ul>

    <h2 class="fs-4 text-secondary my-4">
        {{ __('Profile') }}
    </h2>
    <div class="card p-4 mb-4 bg-white shadow rounded-lg">

        @include('profile.partials.update-profile-information-form')

    </div>

    <div class="card p-4 mb-4 bg-white shadow rounded-lg">


        @include('profile.partials.update-password-form')

    </div>

    <div class="card p-4 mb-4 bg-white shadow rounded-lg">


        @include('profile.partials.delete-user-form')

    </div>
</div>

@endsection
