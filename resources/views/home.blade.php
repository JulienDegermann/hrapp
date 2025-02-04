@extends('layout')


@section('content')
<section id="presents">
    <div class="container">
        <div class="flex wrap">


            <h2 class="title">{{ $profile->first_name }}</h2>

            <p>
                LeBonDev, c'est l'application qui permet aux entreprises d'entrer en contact avec des développeurs talentueux.
                Elles pourront ainsi trouver leur(s) futur(s )collaborateur(s) chargés de concevoir leurs outils de demain.
                Finder, c'est l'application qui permet aux entreprises de contacter les
                développeurs qui concevront leurs outils de demain.
            </p>
            <img src="{{ asset('uploads/images/macbook-pro.jpeg') }}" alt="macbook pro">



            @if(isset($profile->github) || isset($profile->linkedin))
            <div class="social-links">
                @if(isset($profile->github))
                <a href="{{ $profile->github }}">GitHub</a>
                @endif
                @if(isset($profile->linkedin))
                <a href="{{ $profile->linkedin }}">Linkedin</a>
            </div>
            @endif
            @endif
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="flex wrap">
            <h2 class="title">Tous les profils</h2>
            @foreach($profiles as $profile)
            <div class="profile">
                <h3 class='title'>{{ $profile->first_name }} {{ $profile->last_name }}</h3>
                <p>e-mail : {{ $profile->email }}</p>
                <p>phone : {{ $profile->phone ?? ''}}</p>
                <img src="{{ asset('uploads/images/'.$profile->picture)}}" alt="photo de {{$profile->first_name}}">

            </div>
            @endforeach
        </div>
    </div>

</section>
@endsection