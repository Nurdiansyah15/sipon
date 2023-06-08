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
        Schema::create('acc_dispens', function (Blueprint $table) {
            $table->id();
            $table->string('dispen_desc');

            $table->string('nis', 50)->constrained()->required(); //
            $table->foreign('nis')->references('nis')->on('santris')->cascadeOnDelete();

            $table->string('dispen_periode');
            $table->date('pay_at');
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
        Schema::dropIfExists('dispens');
    }
};
