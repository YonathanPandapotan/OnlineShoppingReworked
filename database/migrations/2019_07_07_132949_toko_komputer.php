<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TokoKomputer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Users', function (Blueprint $table) {
            $table->string('idUser', 150)->primary();
            $table->string('namaUser', 150);
            $table->string('email', 150);
            $table->string('password', 150);
            $table->text('auth_token');
        });

        Schema::create('Alamat', function (Blueprint $table){
            $table->string('idAlamat', 150)->primary();
            $table->string('idUser', 150);
            $table->text('alamat');
            $table->foreign('idUser')->references('idUser')->on('Users');
        });

        Schema::create('Barang', function (Blueprint $table){
           $table->string('idBarang', 150)->primary();
           $table->string('namaBarang', 150);
           $table->integer('hargaBarang');
           $table->text('deskripsi');
        });

        Schema::create('Kantor', function (Blueprint $table){
            $table->string('idKantor', 150)->primary();
            $table->string('namaKantor', 150);
            $table->text('alamatKantor');
        });

        Schema::create('Stock', function (Blueprint $table){
            $table->string('idStockBarang', 150)->primary();
            $table->string('idBarang', 150);
            $table->string('idKantor', 150);
            $table->integer('jumlah');
            $table->foreign('idBarang')->references('idBarang')->on('Barang');
            $table->foreign('idKantor')->references('idKantor')->on('Kantor');
        });

        Schema::create('Keranjang', function (Blueprint $table){
            $table->string('idBarang', 150);
            $table->string('idUser', 150);
            $table->integer('jumlah');
            $table->foreign('idBarang')->references('idBarang')->on('Barang');
            $table->foreign('idUser')->references('idUser')->on('Users');
        });

        Schema::create('Transaksi', function (Blueprint $table){
            $table->string('idTransaksi', 150)->primary();
            $table->string('idUser', 150);
            $table->integer('hargaTotal');
            $table->integer('jumlahTotal');
            $table->String('idAlamat', 150);
            $table->integer('statusPembayaran');
            $table->timestamps();
            $table->foreign('idUser')->references('idUser')->on('Users');
            $table->foreign('idAlamat')->references('idAlamat')->on('Alamat');
        });

        Schema::create('DetailTransaksi', function (Blueprint $table){
            $table->string('idTransaksi', 150);
            $table->string('idStockBarang', 150);
            $table->integer('jumah');
            $table->foreign('idTransaksi')->references('idTransaksi')->on('Transaksi');
            $table->foreign('idStockBarang')->references('idStockBarang')->on('Stock');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('User');
    }
}
