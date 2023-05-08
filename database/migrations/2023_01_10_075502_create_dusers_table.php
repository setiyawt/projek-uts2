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
        Schema::create('duser', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('username');
            $table->string('password');
            $table->string('user_telp');
            $table->string('user_email');
            $table->text('user_address');
            $table->string('user_image');
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
        Schema::dropIfExists('duser');
    }
};
