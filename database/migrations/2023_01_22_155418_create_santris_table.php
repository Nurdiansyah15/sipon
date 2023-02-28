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
        Schema::create('santris', function (Blueprint $table) {
            $table->string('nis')->required();
            $table->primary('nis');

            $table->unsignedBigInteger('user_id')->constrained()->required();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();

            $table->string('program')->nullable();
            $table->string('fullname')->nullable();
            $table->timestamp('dob')->nullable();
            $table->string('pob')->nullable();
            $table->string('grade')->nullable();
            $table->string('no_hp')->nullable();
            $table->text('address')->nullable();
            $table->string('district')->nullable();
            $table->string('sub_district')->nullable();
            $table->string('blood_type')->nullable();
            $table->string('parent')->nullable();
            $table->string('no_parent')->nullable();
            $table->string('university')->nullable();
            $table->string('path_photo')->nullable();
            $table->string('room')->nullable();
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
        Schema::dropIfExists('santris');
    }
};
