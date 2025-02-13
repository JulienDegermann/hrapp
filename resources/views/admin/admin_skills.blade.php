@extends('admin.admin')

@section('admin_content')
<section>
    <div class="container">



        <a class="button" href="{{ route('admin.edit_skill', null) }}">Créer une compétence</a>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Version</th>
                    <th>Edit</th>
                    <th>delete</th>
                </tr>
            </thead>
            @foreach($skills as $skill)
            <tr>
                <td>{{$skill->title}}</td>
                <td>{{$skill->version}}</td>
                <td><a class="button" href="{{ route('admin.edit_skill', ['id' => $skill->id]) }}">edit</a></td>
                <td>
                    <form
                        action="{{ route('admin.delete_skill', ['id' => $skill->id]) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="button cta" type="submit">delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</section>


@endsection