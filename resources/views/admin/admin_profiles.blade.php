@extends('admin.admin')

@section('admin_content')
<section>
    <div class="container">

        <a class="button" href="{{ route('admin.edit_profile', null)}}">Créer un profile</a>
        <table>
            <thead>
                <tr>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>E-mail</th>
                    <th>Téléphone</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            @foreach($profiles as $profile)
            <tr>
                <td>{{$profile->first_name}}</td>
                <td>{{$profile->last_name}}</td>
                <td><a href="mailto:{{$profile->email}}">{{$profile->email}}</a></td>
                <td><a href="tel:{{$profile->phone}}">{{$profile->phone}}</a></td>
                <td><a class="button" href="{{ route('admin.show_profile', ['id' => $profile->id]) }}">show</a></td>
                <td><a class="button" href="{{ route('admin.edit_profile', ['id' => $profile->id]) }}">edit</a></td>
                <td>
                    <form
                        action="{{ route('admin.delete_profile', ['id' => $profile->id]) }}"
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