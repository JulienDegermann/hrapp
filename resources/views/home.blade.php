@extends('layout')


@section('content')
<h1>Home</h1>
<p>Welcome to our home page!</p>
@foreach($profiles as $profile)
<div class="profile">
    <h2>{{ $profile->first_name }} {{ $profile->last_name }}</h2>
    <p>e-mail{{ $profile->email }}</p>
    <p>phone{{ $profile->phone }}</p>
    <p>resume{{ $profile->resume }}</p>


</div>
@endforeach
@endsection