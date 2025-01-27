<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\TransaksiPendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{
    public function index()
    {
        $query = DB::table('transaksi_pendaftaran')
            ->join('kursus', 'transaksi_pendaftaran.id_kursus', '=', 'kursus.id_kursus') // Correct join on UUID
            ->where('transaksi_pendaftaran.id_users', '=', Auth::user()->id) // Filter by authenticated user
            ->select('kursus.id_kursus', 'kursus.nama_kursus', 'kursus.harga', 'kursus.deskripsi', 'transaksi_pendaftaran.payment_status') // Explicitly select required columns
            ->paginate(10);

        return view('dashboard.index', ['courses' => $query]);
    }
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
