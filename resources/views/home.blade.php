@extends('layout')


@section('content')
<section id="presents">
    <div class="container">
        <div class="flex wrap">


            <h2 class="title">{{ $default_profile->first_name }}</h2>

            <p>
                LeBonDev, c'est l'application qui permet aux entreprises d'entrer en contact avec des développeurs talentueux.
                Elles pourront ainsi trouver leur(s) futur(s )collaborateur(s) chargés de concevoir leurs outils de demain.
                Finder, c'est l'application qui permet aux entreprises de contacter les
                développeurs qui concevront leurs outils de demain.
            </p>
            <img src="{{ asset('uploads/images/macbook-pro.jpeg') }}" alt="macbook pro">



            @if(isset($default_profile->github) || isset($default_profile->linkedin))
            <div class="social-links">
                @if(isset($default_profile->github))
                <a href="{{ $default_profile->github }}">GitHub</a>
                @endif
                @if(isset($pdefault_rofile->linkedin))
                <a href="{{ $default_profile->linkedin }}">Linkedin</a>
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
            @foreach($profiles as $current_profile)

            <a href="{{ route('profile_show', $current_profile->id) }}" class="profile-card">

                <h3 class='title'>{{ $current_profile->first_name }} {{ $current_profile->last_name }}</h3>
                <img src="{{ $current_profile->picture ? asset('uploads/images/' . $current_profile->picture) : asset('images/default-profile.webp') }}" alt="photo de {{ $current_profile->first_name }}">
            </a>
            @endforeach
        </div>
    </div>

</section>

<section>
    <div class="container">
        <h2 class="title">
            Nos offres d'emploi
        </h2>

        @foreach($jobs as $job)
        @include('_partials._job_card')
        @endforeach
    </div>
</section>


<section>
    <div class="container">
        @include('_partials._forms._contact_form')
    </div>
</section>
@endsection