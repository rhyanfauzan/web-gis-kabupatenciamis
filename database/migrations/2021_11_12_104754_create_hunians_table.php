<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHuniansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hunians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('desa_id');
            $table->unsignedBigInteger('status_kepemilikan_id');
            $table->unsignedBigInteger('fisik_bangunan_id')->nullable();
            $table->unsignedBigInteger('bentuk_bangunan_id');
            $table->unsignedBigInteger('pendapatan_keluarga_id');
            $table->string('foto_hunian');
            $table->double('luas_tanah');
            $table->double('luas_bangunan');
            $table->enum('layak_huni', ['y', 't', 'b'])->default('b');
            $table->enum('tersedia_listrik', ['y', 't']);
            $table->enum('dibangun_oleh_pengembang', ['y', 't']);
            $table->enum('memiliki_imb', ['y', 't']);
            $table->string('nama_pengembang')->nullable(true);
            $table->string('nomor_imb')->nullable(true);
            $table->string('foto_pemilik')->nullable(true);
            $table->string('nama_pemilik')->nullable(true);
            $table->string('nik_pemilik')->nullable(true);
            $table->string('no_kk_pemilik')->nullable(true);
            $table->string('tanggal_lahir_pemilik')->nullable(true);
            $table->string('no_telepon_pemilik')->nullable(true);
            $table->string('email_pemilik')->nullable(true);
            $table->unsignedInteger('jumlah_keluarga')->nullable(true);
            $table->text('alamat_detail');
            $table->double('latitude');
            $table->double('longitude');
            $table->string('kondisi_atap')->nullable(true);
            $table->string('kondisi_dinding')->nullable(true);
            $table->string('kondisi_lantai')->nullable(true);
            $table->string('kondisi_kamar_mandi')->nullable(true);
            $table->string('kondisi_mck')->nullable(true);
            $table->string('kondisi_sumber_air_minum')->nullable(true);
            $table->enum('septic_tank', ['y', 't'])->nullable(true);
            $table->double('luas_bangunan_perkapita');
            $table->integer('status');
            $table->integer('penginput_id')->nullable(true);
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
        Schema::dropIfExists('hunians');
    }
}
