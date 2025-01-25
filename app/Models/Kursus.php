<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kursus extends Model
{
    use HasFactory;

    // Specify the table name (optional if table name is plural of the model)
    protected $table = 'kursus';

    // Specify the primary key (UUID in this case)
    protected $primaryKey = 'id_kursus';

    // Set the type of the primary key
    protected $keyType = 'string';

    // Disable timestamps if not needed, since your table doesn't have created_at and updated_at
    public $timestamps = false;

    // Specify the fillable attributes
    protected $fillable = [
        'id_kursus',
        'nama_kursus',
        'deskripsi',
        'harga',
        'status_kursus',
        'jumlah_siswa_yang_terdaftar',
        'tgl_dibuat',
    ];

    // Optionally, you can define a relationship with TransaksiPendaftaran (if needed)
    public function transaksiPendaftarans()
    {
        return $this->hasMany(TransaksiPendaftaran::class, 'id_kursus', 'id_kursus');
    }
}
