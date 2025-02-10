@extends('admin.admin')

@section('admin_content')
<section>
    <div class="container">

        <a class="button cta" href="{{ route('admin.profile.create')}}">Créer un profile</a>
        <table>
            <thead>
                <tr>
                    <td>Firstname</td>
                    <td>Lastname</td>
                    <td>Email</td>
                    <td>Phone</td>
                    <td>Resume</td>
                    <td>View</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
            </thead>
            @foreach($profiles as $profile)
            <tr>
                <td>{{$profile->first_name}}</td>
                <td>{{$profile->last_name}}</td>
                <td>{{$profile->email}}</td>
                <td>{{$profile->phone}}</td>
                <td>{{$profile->resume}}</td>
                <td><a class="button" href="{{ route('admin.profile.show', ['id' => $profile->id]) }}">show</a></td>
                <td><a class="button" href="{{ route('admin.profile.edit', ['id' => $profile->id]) }}">edit</a></td>
                <td>
                    <form
                        action="{{ route('admin.profile.delete', ['id' => $profile->id]) }}"
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