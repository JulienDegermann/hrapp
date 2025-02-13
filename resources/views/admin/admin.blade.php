@extends('layout')

@section('content')
<section id="admin">
    <div class="flex">
        <aside class="admin-nav flex col between">
            <ul>
                <li><a class="{{ Route::is('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li><a class="{{ Route::is('admin.show_profiles') ? 'active' : '' }}" href="{{ route('admin.show_profiles') }}">Liste des profils</a></li>
                <li><a class="{{ Route::is('admin.show_skills') ? 'active' : '' }}" href="{{ route('admin.show_skills') }}">Liste des compétences</a></li>
                <li><a class="{{ Route::is('admin.show_jobs') ? 'active' : '' }}" href="{{ route('admin.show_jobs') }}">Liste des jobs</a></li>
            </ul>
            <ul>
                <li><a class="{{ Route::is('admin.home') ? 'active' : '' }}" href="{{ route('home') }}">Site Web</a></li>
            </ul>
        </aside>
        <div class="content">

            @yield('admin_content')
        </div>

    </div>
</section>

@endsection