<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function courses()
    {
        $kursus = Kursus::all();
        return view('dashboard.courses', ['courses' => $kursus]);
    }
}
