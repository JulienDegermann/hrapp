@extends('email_layout')


@section('email_content')
@if(isset($profile))
<h1>Nouveau message pour {{ $profile->first_name . " " . $profile->last_name  }}</h1>
<p>Bonjour {{ ucwords($profile->first_name) }}, {{ $datas['first_name'] }} {{ strtoupper($datas['last_name'])}} {{ isset($datas['company']) ?  "(de " . ucwords($datas['company']) . ")" : ''}} cherche à te contacter.</p>
<p>"{{ $datas['message'] }}"</p>
<p>L'équipe HRApp</p>

@else
<h1>Nouveau message (formulaire de contact)</h1>
<p>Message de {{ $datas['first_name'] }} {{ strtoupper($datas['last_name'])}} {{ isset($datas['company']) ?  "(de " . ucwords($datas['company']) . ")" : ''}} :</p>
<p>"{{ $datas['message'] }}"</p>
@endif
@endsection