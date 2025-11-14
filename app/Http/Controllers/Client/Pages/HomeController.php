<?php

namespace App\Http\Controllers\Client\Pages;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $url = request()->url();
        return view(route('accueil'));
    }
}
