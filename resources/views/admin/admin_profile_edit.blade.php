@extends('layout')

@section('content')
<section>
    <div class="container">
        <p>début 1er form</p>
        @include('_partials._forms._profile_form')
        <p>début 2e form</p>
        @include('_partials._forms._experiences_form')
    </div>
</section>
@endsection