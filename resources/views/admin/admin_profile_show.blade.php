@extends('layout')

@section('content')

<h1>Profile de {{ $profile->first_name}} {{ $profile->last_name}}</h1>

<p><strong>Email:</strong> {{ $profile->email }}</p>
<p><strong>Phone:</strong> {{ $profile->phone }}</p>
<p><strong>E-mail:</strong> {{ $profile->email }}</p>
<p><strong>Linkedin:</strong> {{ $profile->linkedin ?? 'non renseigné' }}</p>
<p><strong>Phone:</strong> {{ $profile->github ?? 'non renseigné' }}</p>
<p><strong>Resume:</strong> {{ $profile->resume }}</p>
<p><strong>Picture:</strong> {{ $profile->picture }}</p>

<a href="{{ route('admin.profile.edit', ['id' => $profile->id]) }}">edit</a>
<form action="{{ route('admin.profile.delete', ['id' => $profile->id]) }}" method="POST">
    @csrf
    @method('delete')
    <input type="submit" value="supprimer">
</form>
<a href="{{ route('admin.profiles') }}">Back to list</a>

@endsection