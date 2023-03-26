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
        Schema::create('sec_acts_permits', function (Blueprint $table) {
            $table->id();
            $table->string('nis', 50)->constrained()->required(); //
            $table->foreign('nis')->references('nis')->on('santris')->cascadeOnDelete();
            $table->string('nis_user')->constrained()->required();
            $table->foreign('nis_user')->references('nis_santri')->on('users')->cascadeOnDelete();
            $table->unsignedBigInteger('sec_acts_id')->constrained()->required(); //
            $table->foreign('sec_acts_id')->references('id')->on('sec_acts')->cascadeOnDelete();
            $table->boolean('confirmed', 1);
            $table->string('reason', 100);
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
        Schema::dropIfExists('sec_acts_permits');
    }
};
