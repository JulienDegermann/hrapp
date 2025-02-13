@extends('admin.admin')

@section('admin_content')
<section id="jobs">
    <div class="container">
        <div class="flex">
            <div class="jobs">


                <a class="button" href="{{ route('admin.edit_job') }}">Créer un poste</a>
                <table>
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Ville</th>
                            <th>Publié le</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    @foreach($jobs as $current)
                    <tr>
                        <td>{{ $current->title }}</td>
                        <td>{{ $current->location }}</td>
                        <td>{{$current->resume}}</td>
                        <td><a href="{{ route('admin.edit_job', $current->id) }}" class="button">modifier</a></td>
                        <td>
                            <form action="{{ route('admin.delete_job', $current->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="suppimer" class="button">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>

        </div>

    </div>
</section>
@endsection