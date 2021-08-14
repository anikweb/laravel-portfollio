<?php

namespace App\Http\Controllers;

use App\Models\SiteSettings;

class BackendController extends Controller
{
    function dashboard(){
        return view('backend.dashboard');
    }
}
