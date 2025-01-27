<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kursus;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class CoursesController extends Controller
{
    public function manageCourses()
    {
        $kursus = Kursus::paginate(5);
        return view('dashboard.admin.manage_courses', ['courses' => $kursus]);
    }

    public function deleteCourses(Request $request)
    {
        // Mengambil input selected_categories dari request
        $courses = $request->input('selected_courses');

        // Menggunakan explode untuk memisahkan nama kursus
        $courses = explode(',', $courses);

        // Menghapus kursus berdasarkan nama_kursus
        $deletedCount = Kursus::whereIn('nama_kursus', $courses)->delete();

        // Mengecek apakah ada kursus yang dihapus
        if ($deletedCount) {
            return redirect()->route('admin.manage_courses')->with('success', 'Courses Deleted Successfully!');
        } else {
            return redirect()->route('admin.manage_courses')->with('error', 'Failed to Delete Courses!, Internal Error Has Occurred!');
        }
    }

    public function createCourses(Request $request)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:kursus,nama_kursus',
            'description' => 'required|string',
            'price' => 'required|integer',
            'student_count' => 'required|integer',
            'status' => 'nullable|boolean', // Status bisa aktif (1) atau tidak aktif (0)
        ]);

        // Membuat kursus baru jika validasi berhasil
        try {
            $kursus = new Kursus();
            $kursus->id_kursus = Str::uuid(); // Menggunakan UUID untuk ID
            $kursus->nama_kursus = $validatedData['name'];
            $kursus->deskripsi = $validatedData['description'];
            $kursus->harga = $validatedData['price'];
            $kursus->status_kursus = $validatedData['status'] ? 'active' : 'inactive'; // Status aktif atau tidak aktif
            $kursus->jumlah_siswa_yang_terdaftar = $validatedData['student_count'];
            $kursus->tgl_dibuat = Carbon::now(); // Menyimpan waktu pembuatan

            // Simpan ke database
            $kursus->save();

            // Redirect dengan pesan sukses
            return redirect()->route('admin.manage_courses')->with('success', 'Kursus berhasil dibuat!');
        } catch (\Exception $e) {
            // Jika terjadi error, tampilkan pesan gagal
            return redirect()->back()->withErrors(['msg' => 'Gagal membuat kursus: ' . $e->getMessage()]);
        }
    }

    public function editCourses($id)
    {
        // Mencari kursus berdasarkan ID
        $course = Kursus::findOrFail($id);

        // Menampilkan halaman edit dengan data kursus
        return view('dashboard.admin.edit_courses', compact('course'));
    }

    // Memperbarui kursus yang ada
    public function updateCourses(Request $request, $id)
    {
        // Mencari kursus berdasarkan ID
        $kursus = Kursus::findOrFail($id);

        // Validasi input menggunakan $request->validate()
        $validatedData = $request->validate([
            'nama_kursus' => 'required|string|max:255|unique:kursus,nama_kursus,' . $id . ',id_kursus', // Mengecek apakah nama kursus sudah ada
            'deskripsi' => 'required|string|max:1000',
            'harga' => 'required|integer|min:0',
            'status_kursus' => 'required|in:active,inactive', // Status harus antara active atau inactive
            'jumlah_siswa_yang_terdaftar' => 'required|integer|min:0',
        ]);

        // Memperbarui data kursus dengan data yang sudah tervalidasi
        $kursus->update($validatedData);

        // Redirect ke halaman yang sesuai setelah berhasil update
        return redirect()->route('admin.manage_courses')->with('success', 'Kursus berhasil diperbarui!');
    }
}
