@extends('admin.admin')

@section('admin_content')
<section>
    <div class="container">

        <h2>{{ $job ? "Modifier l'" : "Créer une nouvelle" }} annonce </h2>
        @include('_partials._forms._job_form')

    </div>
</section>
@endsection