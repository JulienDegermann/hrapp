<?php

namespace App\Http\Controllers;

use App\Models\Profile;

final class HomeController
{
    public function index()
    {
        $profile = Profile::firstOrCreate(
            ['first_name' => 'John'   ], 
            ['last_name' => 'Doe', 'email' => 'john@doe.fr']);
        $datas = $profile::all();
        return view('home', ['datas' => $datas]);
    }
}
