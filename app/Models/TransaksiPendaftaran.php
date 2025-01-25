<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPendaftaran extends Model
{
    use HasFactory;

    // Specify the table name (optional if table name is plural of the model)
    protected $table = 'transaksi_pendaftaran';

    // Specify the primary key (UUID in this case)
    protected $primaryKey = 'id_transaksi_pendaftaran';

    // Set the type of the primary key
    protected $keyType = 'string';

    // Disable timestamps if not needed, since your table doesn't have created_at and updated_at
    public $timestamps = false;

    // Specify the fillable attributes
    protected $fillable = [
        'id_transaksi_pendaftaran',
        'id_users',
        'id_kursus',
        'payment_status',
        'tgl_pendaftaran',
    ];

    // Define the relationship with Kursus
    public function kursus()
    {
        return $this->belongsTo(Kursus::class, 'id_kursus', 'id_kursus');
    }

    // Define the relationship with Users (assuming a User model exists)
    public function user()
    {
        return $this->belongsTo(User::class, 'id_users', 'id');
    }
}
