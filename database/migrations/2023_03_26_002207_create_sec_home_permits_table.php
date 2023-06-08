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
        Schema::create('sec_home_permits', function (Blueprint $table) {
            $table->id();
            $table->string('nis', 50)->constrained()->required(); //
            $table->foreign('nis')->references('nis')->on('santris')->cascadeOnDelete();
            $table->string('nis_approval')->constrained()->required();
            $table->foreign('nis_approval')->references('nis_santri')->on('users')->cascadeOnDelete();
            $table->string('nis_recipient')->constrained()->required();
            $table->foreign('nis_recipient')->references('nis_santri')->on('users')->cascadeOnDelete();
            $table->date('go');
            $table->date('return');
            $table->date('arrival');
            $table->boolean('status', 1);
            $table->boolean('is_lead_approval', 1);
            $table->string('description', 100);
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
        Schema::dropIfExists('sec_home_permits');
    }
};
