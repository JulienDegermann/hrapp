@extends('admin.admin')

@section('admin_content')
<section>
    <div class="container">
        <div class="flex">
            <div>
                <h2>Liste des compétences</h2>
                @foreach($skills as $current)
                <div class="flex">
                    <p>{{ $current->title }}</p>
                    <a class="button" href="{{ route('admin.show_skills', ['id' => $current->id]) }}">Modifier</a>
                    <form action="{{ route('admin.delete_skill', ['id' => $current->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" class="button" value="Supprimer">
                    </form>

                </div>
                @endforeach


            </div>
            @include('_partials._forms._skills_form')
        </div>
    </div>
</section>


@endsection