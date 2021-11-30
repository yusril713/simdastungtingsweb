<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('instansi_id')->nullable()->after('id')->constrained('tb_instansi')->onDelete('set null');
            $table->string('no_telp', 20)->nullable()->after('password');
            $table->string('alamat')->nullable()->after('no_telp');
            $table->string('jenis_kelamin')->nullable()->after('alamat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
