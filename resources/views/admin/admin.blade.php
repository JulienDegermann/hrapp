@extends('layout')

@section('content')
<section>
    <div class="flex">
        <aside class="admin_nav flex col between">
            <ul>
                <li>
                </li>
                <li>
                    <a class="{{ Route::is('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li>
                    <a class="{{ Route::is('admin.profiles') ? 'active' : '' }}" href="{{ route('admin.profiles') }}">Liste des profils</a>
                </li>
                <li>
                    <a class="{{ Route::is('admin.show_skills') ? 'active' : '' }}" href="{{ route('admin.show_skills') }}">Liste des compétences</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a class="{{ Route::is('admin.home') ? 'active' : '' }}" href="{{ route('home') }}">Site Web</a>
                </li>
            </ul>
        </aside>
        <div class="content">

            @yield('admin_content')
        </div>

    </div>
</section>

@endsection