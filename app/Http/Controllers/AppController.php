<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function courses(Request $request)
    {
        $search = $request->input('search');
        $query = Kursus::query();

        if ($search) {
            $query->where('nama_kursus', 'like', '%' . $search . '%')
                ->orWhere('deskripsi', 'like', '%' . $search . '%');
        }

        // Paginate the results
        $kursus = $query->paginate(10);

        return view('dashboard.courses', ['courses' => $kursus, 'search' => $search]);
    }
}
