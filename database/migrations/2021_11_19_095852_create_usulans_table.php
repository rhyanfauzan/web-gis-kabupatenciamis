<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsulansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usulans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('desa_id');
            $table->unsignedBigInteger('status_kepemilikan_id');
            $table->unsignedBigInteger('sumber_dana_bantuan_id');
            $table->unsignedBigInteger('pendapatan_keluarga_id');
            $table->unsignedBigInteger('prioritas_usulan_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('verifikator_id')->nullable();
            $table->string('nomor_imb')->nullable(true);
            $table->string('foto_pemilik')->nullable(true);
            $table->string('foto_ktp')->nullable(true);
            $table->string('foto_kk')->nullable(true);
            $table->string('nama_pemilik')->nullable(true);
            $table->string('nik_pemilik')->nullable(true);
            $table->string('no_kk_pemilik')->nullable(true);
            $table->string('tanggal_lahir_pemilik')->nullable(true);
            $table->string('no_telepon_pemilik')->nullable(true);
            $table->string('email_pemilik')->nullable(true);
            $table->unsignedInteger('jumlah_keluarga')->nullable(true);
            $table->text('alamat_detail');
            $table->point('lokasi');
            $table->double('luas_tanah');
            $table->double('luas_bangunan');
            $table->double('luas_bangunan_perkapita');
            $table->enum('tersedia_listrik', ['y', 't']);
            $table->enum('memiliki_imb', ['y', 't']);
            $table->enum('septic_tank', ['y', 't'])->nullable(true);
            $table->timestamp('diverifikasi')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usulans');
    }
}
