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
        // Schema::create('users', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('nis', 50)->index()->unique();
        //     $table->string('password', 255);
        //     $table->rememberToken();
        //     $table->timestamps();
        // });
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nis_santri', 50)->unique()->constrained()->required();
            $table->foreign('nis_santri')->references('nis')->on('santris')->cascadeOnDelete();
            $table->string('password', 255);
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
        Schema::dropIfExists('users');
    }
};
