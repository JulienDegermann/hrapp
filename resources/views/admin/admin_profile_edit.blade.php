@extends('admin.admin')

@section('admin_content')
<section>
    <div class="container">
        <div class="flex">
            @include('_partials._forms._profile_form')

            @include('_partials._forms._experiences_form')
        </div>

    </div>
</section>
@endsection