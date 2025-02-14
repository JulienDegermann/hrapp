@extends('layout')

@section('content')
<section id="profile">
    <div class="container">
    <h2>Candidature : {{ $job->title }}</h2>

    @include('_partials._forms._job_apply_form')
    </div>
</section>

@endsection