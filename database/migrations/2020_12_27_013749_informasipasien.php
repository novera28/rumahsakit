<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InformasiPasien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informasipasien', function (Blueprint $table) {
            $table->id('id_infopasien'); // sudah auto increment
            $table->unsignedBigInteger('id_pasien')->unsigned();
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien')->onUpdate('cascade')->onDelete('cascade');

            $table->string("ciri_fisik")->nullable();
            $table->unsignedBigInteger("cacat_fisik")->nullable();
            $table->foreign('cacat_fisik')->references('id_cacatfisik')->on('cacatfisik')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger("bahasa")->nullable();
            $table->foreign('bahasa')->references('id')->on('bahasa')->onUpdate('cascade')->onDelete('cascade');

            $table->string("hubungan_keluarga")->nullable();
            $table->string("nama_keluarga")->nullable();
            $table->string("pekerjaan_keluarga")->nullable();
            $table->string("telpon")->nullable();
            $table->string("email")->unique()->nullable();
            $table->string("jenis_kelamin")->nullable();

            $table->text('kelurahan', 30)->nullable();
            $table->text('kecamatan', 30)->nullable();
            $table->text('kabupaten', 30)->nullable();
            $table->text('provinsi', 30)->nullable();
            $table->string("alamat")->nullable();

            $table->timestamps();
            $table->softDeletes('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informasipasien');
    }
}
