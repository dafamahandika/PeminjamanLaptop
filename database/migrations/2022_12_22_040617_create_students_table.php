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
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->char('nisn', 10)->unique();
            $table->string('nama');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('email')->unique();
            $table->string('asal_sekolah');
            $table->char('no_phone');
            $table->string('referensi');
            $table->string('status')->nullable();
            $table->string('validator')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('student');
    }
};
