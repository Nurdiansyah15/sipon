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
        Schema::create('registers', function (Blueprint $table) {
            $table->id();
            $table->string('no_regis', 50)->unique()->required();
            $table->string('password', 255)->required();
            $table->string('fullname', 100)->required();
            $table->string('email', 100)->required();
            $table->string('program', 20)->required();
            $table->string('option', 1)->required();
            $table->string('nik', 20)->required();
            $table->string('phone', 15)->required();

            $table->unsignedBigInteger('setting_id')->constrained()->required();
            $table->foreign('setting_id')->references('id')->on('psb_settings');

            $table->string('nickname', 20)->nullable();
            $table->string('hobby', 20)->nullable();
            $table->string('purpose', 20)->nullable();
            $table->string('workplace', 50)->nullable();
            $table->string('department', 50)->nullable();
            $table->string('status', 1)->nullable();
            $table->string('sbc')->nullable();
            $table->string('blood', 1)->nullable();
            $table->date('dob')->nullable();
            $table->string('pob', 30)->nullable();
            $table->string('grade_id', 2)->nullable();
            $table->string('room_id', 2)->nullable();
            $table->text('address', 100)->nullable();
            $table->string('district', 30)->nullable();
            $table->string('sub_district', 30)->nullable();
            $table->string('province', 30)->nullable();
            $table->string('postal_code', 10)->nullable();
            $table->string('nisn', 10)->nullable();
            $table->string('no_kip', 10)->nullable();
            $table->string('no_pkh', 10)->nullable();
            $table->string('no_kks', 20)->nullable();
            $table->string('home_status', 50)->nullable();
            $table->string('no_kk', 20)->nullable();
            $table->string('father', 100)->nullable();
            $table->string('father_pn', 15)->nullable();
            $table->string('father_nik', 20)->nullable();
            $table->string('father_job', 50)->nullable();
            $table->string('father_graduate', 50)->nullable();
            $table->string('father_income', 20)->nullable();
            $table->string('mother', 100)->nullable();
            $table->string('mother_pn', 15)->nullable();
            $table->string('mother_nik', 20)->nullable();
            $table->string('mother_job', 50)->nullable();
            $table->string('mother_graduate', 50)->nullable();
            $table->string('mother_income', 20)->nullable();
            $table->string('guardian', 100)->nullable();
            $table->string('guardian_pn', 15)->nullable();
            $table->string('guardian_nik', 20)->nullable();
            $table->string('guardian_job', 50)->nullable();
            $table->string('guardian_graduate', 50)->nullable();
            $table->string('guardian_income', 20)->nullable();
            $table->string('path_photo', 100)->nullable();

            $table->date('joined_at')->nullable();
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
        Schema::dropIfExists('registers');
    }
};
