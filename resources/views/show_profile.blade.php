@extends('layout')

@section('content')
<section id="profile">
    <div class="container">
        <h2 class="title">{{ $profile->first_name }} {{ $profile->last_name }}</h2>

        <p>{{ $profile->email ?? $profile->email }}</p>
        <p>{{ $profile->phone ?? $profile->phone }}</p>
        <p>{{ $profile->resume ?? $profile->resume }}</p>
        <p>{{ $profile->linkedin ?? $profile->linkedin }}</p>
        <p>{{ $profile->github ?? $profile->github }}</p>
        @if(isset($profile->picture))
        <img src="{{ asset('uploads/images/'. $profile->picture) }}" alt="image du projet {{ $profile->first_name }}">
        @endif


        @foreach($profile->experiences as $experience)
        <h2 class="title">Expériences professionnelles</h2>
        <div class="profile-experience flex">
            @if(isset($experience->picture))
            <img src="{{ asset('uploads/images/'. $experience->picture) }}" alt="image du projet {{ $experience->title }}">
            @endif
            <div class="text">
                <h3 class="title">{{ $experience->title }}</h3>
                <p>{{ $experience->description }}</p>
                <a class="button" href="{{ $experience->url ?? $experience->url }}"> Lien </a>
                <a class="button" href="{{ $experience->github ?? $experience->github }}"> Lien GitHub </a>
                @if(isset($experience->skills) && count($experience->skills) > 0)
                <ul class="skill-list">
                    @foreach($experience->skills as $skill)
                    <li>{{ $skill->title }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
        @endforeach
        <a class="button" href="{{ route('contact_show', $profile->id) }}">Contacter ce développeur</a>
    </div>
</section>

@endsection