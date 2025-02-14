@extends('layout')

@section('content')
<section id="job">
    <div class="container">
        <h2 class="title">{{ $job->title }}</h2>
        <p>💶 {{ $job->remuneration_min }} - {{ $job->remuneration_max }} € bruts annuels</p>
        <p>📍 {{ $job->location }}</p>
        <p>Publiée le {{ $job->published_at }} </p>
        <p>Début souhaité le {{ $job->start_date->format('j-m-y' ) }} </p>
        <div class="flex">
            <img src="{{ $job->picture ? asset('uploads/images/'. $job->picture) : asset('images/default-job.webp')}}" alt="image de l'annonce">
            <div class="job-infos">
                <h3>Description du poste</h3>
                <p>{{ $job->description }}</p>

            </div>
        </div>
        <a class="button cta" href="{{ route('job_apply', $job->id) }}">Postuler</a>

    </div>
</section>

@endsection