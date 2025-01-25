<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('usertype')->default('user');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('kursus', function (Blueprint $table) {
            $table->uuid('id_kursus')->primary(); //PK
            $table->string('nama_kursus')->unique();
            $table->text('deskripsi');
            $table->integer('harga');
            $table->enum('status_kursus', ['active', 'inactive']);
            $table->integer('jumlah_siswa_yang_terdaftar')->default(0);
            $table->dateTime('tgl_dibuat');
        });

        Schema::create('transaksi_pendaftaran', function (Blueprint $table) {
            $table->uuid('id_transaksi_pendaftaran')->primary(); //PK
            $table->foreignId('id_users')->constrained('users'); //FK
            $table->foreignUuid('id_kursus') // FK
            ->constrained('kursus', 'id_kursus')
            ->onDelete('cascade');
            $table->enum('payment_status', ['paid', 'unpaid']);
            $table->dateTime('tgl_pendaftaran');
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('kursus');
        Schema::dropIfExists('transaksi_pendaftaran');
        Schema::dropIfExists('sessions');
    }
};
