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
        // Ambil nilai dari request
        $search = $request->input('search');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
        $sortBy = $request->input('sort_by', 'nama_kursus'); // Defaultnya sort by 'nama_kursus'
        $sortOrder = $request->input('sort_order', 'asc'); // Defaultnya urutkan secara ascending

        $query = Kursus::query();

        // Filter berdasarkan nama kursus atau deskripsi
        if ($search) {
            $query->where('nama_kursus', 'like', '%' . $search . '%')
                ->orWhere('deskripsi', 'like', '%' . $search . '%');
        }

        // Filter berdasarkan rentang harga jika ada
        if ($minPrice) {
            $query->where('harga', '>=', $minPrice);
        }

        if ($maxPrice) {
            $query->where('harga', '<=', $maxPrice);
        }

        // Urutkan berdasarkan 'sort_by' dan 'sort_order'
        if (in_array($sortBy, ['nama_kursus', 'harga'])) {
            $query->orderBy($sortBy, $sortOrder);
        }

        // Paginate hasil pencarian dan filter
        $kursus = $query->paginate(10);

        return view('dashboard.courses', [
            'courses' => $kursus,
            'search' => $search,
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
            'sortBy' => $sortBy,
            'sortOrder' => $sortOrder
        ]);
    }
}
