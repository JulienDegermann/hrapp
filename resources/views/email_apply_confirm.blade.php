@extends('email_layout')

@section('email_content')
    <h1>Confirmation de votre candidature</h1>
    <p>Bonjour {{ $candidate->first_name }},</p>
    <p>Nous avons bien reçu votre candidature pour le poste de {{ $job->title }}.</p>
    <p>Vous recevrez une réponse dans les plus brefs délais.</p>
@endsection