<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notapond', function (Blueprint $table) {
            $table->id();
            $table->string('no_pond');
            $table->foreignId('customer_id');
            $table->string('nama_barang_pond');
            $table->integer('quantity_pond');
            $table->foreignId('hargapond_id');

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
        Schema::dropIfExists('notapond');
    }
};
