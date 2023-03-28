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
        Schema::create('psb_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->date('start_period')->nullable();
            $table->date('end_period')->nullable();
            $table->string('quota_tahfidh_pa')->nullable();
            $table->string('quota_tahfidh_pi')->nullable();
            $table->string('quota_kitab_pa')->nullable();
            $table->string('quota_kitab_pi')->nullable();
            $table->string('cost_pa')->nullable();
            $table->string('cost_pi')->nullable();
            $table->string('rekening_pa')->nullable();
            $table->string('rekening_pi')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('psb_setings');
    }
};
