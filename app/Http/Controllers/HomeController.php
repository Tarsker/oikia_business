<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class HomeController extends Controller
{
    public function welcome()
    {
        $companies = Company::all();
        return view('welcome', compact('companies'));
    }
}
