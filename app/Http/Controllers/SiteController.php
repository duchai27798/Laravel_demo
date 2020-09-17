<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home()
    {
        return view('home', ['persons' => Person::all()]);
    }
}
