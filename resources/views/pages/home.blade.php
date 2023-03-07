@extends('layouts.main-layout')

@section('content')

    <div class="container pt-5">
        <h1>
            Your restaurant: {{Auth::user()->business_name}}
        </h1>

        <h2>
            <a href="{{ route('dishCreate') }}">Create new dish</a>
        </h2>

    </div>
@endsection