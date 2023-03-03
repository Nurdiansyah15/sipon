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
            $table->primary('nis');
            $table->string('nis', 50)->constrained()->required();
            $table->foreign('nis')->references('nis')->on('users')->cascadeOnDelete();

            // $table->unsignedBigInteger('user_id')->constrained()->required();
            // $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();

            $table->string('email', 50)->nullable();
            $table->string('program', 20)->nullable();
            $table->string('fullname', 100)->nullable();
            $table->date('dob')->nullable();
            $table->string('pob', 30)->nullable();
            $table->string('grade_id', 2)->nullable();
            $table->string('phone', 15)->nullable();
            $table->text('address', 100)->nullable();
            $table->string('district', 30)->nullable();
            $table->string('sub_district', 30)->nullable();
            $table->string('province', 30)->nullable();
            $table->string('blood', 1)->nullable();
            $table->string('father', 100)->nullable();
            $table->string('father_fn', 15)->nullable();
            $table->string('mother', 100)->nullable();
            $table->string('mother_fn', 15)->nullable();
            $table->string('guardian', 100)->nullable();
            $table->string('guardian_fn', 15)->nullable();
            $table->string('workplace', 50)->nullable();
            $table->string('subject', 50)->nullable();
            $table->string('path_photo', 100)->nullable();
            $table->string('room_id', 2)->nullable();
            $table->string('sbc')->nullable();
            $table->boolean('status', 1)->nullable();
            // $table->unsignedBigInteger('option', 1)->nullable();
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
