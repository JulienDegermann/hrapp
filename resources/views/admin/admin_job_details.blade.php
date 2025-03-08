@extends('layout')


@section('content')

<section id="job-details">
    <div class="container">
        <h2 class="title">Détails du poste : {{ $job->title }}</h2>
        <p>📍 : {{ $job->location }}</p>
        <p>💶 : {{ $job->remuneration_min }} - {{ $job->remuneration_min }} € / an</p>
        <p>📆 : {{ $job->start_date }}</p>
        <div class="flex">
            <div class="job-details">

                <h3 class="title">Annonce</h3>
                <p>Description : {{ $job->description }}</p>

            </div>
            <div class="candidates">
                <h3 class="title">Liste des candidats</h3>
                @foreach($job->candidates as $candidate)
                <div class="candidate">
                    <a class="button" href="{{ asset('uploads/resumes/' . $candidate->resume) }}" target="_blank">{{ $candidate->first_name }} {{ $candidate->last_name }}</a>
                    <a href="{{ asset('uploads/resumes/' . $candidate->resume) }}" target="_blank">Rejeter le profil</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection