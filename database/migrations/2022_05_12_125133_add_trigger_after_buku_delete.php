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
        \Illuminate\Support\Facades\DB::unprepared('
        CREATE TRIGGER tr_after_buku_delete
        AFTER DELETE ON `buku` FOR EACH ROW
            INSERT INTO history_delete
            set
                id = null,
                isbn = old.isbn,
                judul = old.judul,
                pustakawan_id = old.pustakawan_id');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Illuminate\Support\Facades\DB::unprepared('DROP TRIGGER `tr_after_buku_delete`');
    }
};
