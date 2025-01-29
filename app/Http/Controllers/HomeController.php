<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $kursus = Kursus::orderBy('jumlah_siswa_yang_terdaftar', 'desc')->take(3)->get();
        $student = User::where('usertype', 'user')->take(3)->pluck('name');
        return view('index', ['courses' => $kursus, 'students' => $student]);
    }
}
