<?php

namespace App\Http\Controllers;

use App\Models\TransaksiPendaftaran;
use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Notification;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$clientKey = config('midtrans.client_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function createPayment(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|email',
                'amount' => 'required|numeric',
                'course_id' => 'required',
                'course_name' => 'required|string',
            ]);
            $transactionDetails = [
                'order_id' => Str::uuid(),
                'gross_amount' => $request->amount,
            ];

            $customerDetails = [
                'first_name' => $request->name,
                'email' => $request->email,
            ];

            $itemDetails = [
                [
                    'id' => $request->course_id,
                    'price' => $request->amount,
                    'quantity' => 1,
                    'name' => $request->course_name,
                ]
            ];

            // Request params for Midtrans
            $params = [
                'transaction_details' => $transactionDetails,
                'customer_details' => $customerDetails,
                'item_details' => $itemDetails,
            ];
            $snapToken = Snap::getSnapToken($params);

            return response()->json(['snap_token' => $snapToken]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function saveTransaction(Request $request)
    {
        try {
            // Validasi input
            $request->validate([
                'transaction_id' => 'required',
                'user_id' => 'required',
                'course_id' => 'required',
                'payment_status' => 'required|in:paid,unpaid',
            ]);

            $transaksiExist = TransaksiPendaftaran::where('id_kursus', $request->course_id)->first();

            $jumlahSiswa = 1;

            if ($transaksiExist) {
                // Increment
                $jumlahSiswa = $transaksiExist->jumlah_siswa_yang_terdaftar + 1;
            }

            // Menyimpan data transaksi ke dalam tabel
            $transaksi = TransaksiPendaftaran::create([
                'id_transaksi_pendaftaran' => Str::uuid(),
                'id_users' => $request->user_id,
                'id_kursus' => $request->course_id,
                'payment_status' => $request->payment_status,
                'jumlah_siswa_yang_terdaftar' => +1,
                'tgl_pendaftaran' => now(),
            ]);

            // return response()->json(['success' => true, 'transaksi' => $transaksi]);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
}
