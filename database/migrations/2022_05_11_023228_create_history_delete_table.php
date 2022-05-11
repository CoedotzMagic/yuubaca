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
        Schema::create('history_delete', function (Blueprint $table) {
            $table->id();
            $table->string('isbn');
            $table->foreign('isbn')->references('isbn')->on('buku');
            $table->string('judul');
            $table->string('pustakawan');
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
        Schema::dropIfExists('history_delete');
    }
};
