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
            $table->string('program', 50)->required();
            $table->string('type', 1)->required();
            $table->string('option', 1)->required();
            $table->string('nik', 50)->required();
            $table->string('phone', 50)->required();

            $table->unsignedBigInteger('setting_id')->constrained()->required();
            $table->foreign('setting_id')->references('id')->on('psb_settings');

            $table->string('nickname', 50)->nullable();
            $table->string('hobby', 50)->nullable();
            $table->string('purpose', 50)->nullable();
            $table->string('motivation_entry', 255)->nullable();
            $table->string('workplace', 50)->nullable();
            $table->string('department', 50)->nullable();
            $table->string('status', 1)->nullable();
            $table->string('sbc')->nullable();
            $table->string('blood', 3)->nullable();
            $table->date('dob')->nullable();
            $table->string('pob', 50)->nullable();
            $table->string('grade_id', 2)->nullable();
            $table->string('room_id', 2)->nullable();
            $table->text('address', 100)->nullable();
            $table->string('district', 50)->nullable();
            $table->string('sub_district', 50)->nullable();
            $table->string('province', 50)->nullable();
            $table->string('postal_code', 10)->nullable();
            $table->string('nisn', 50)->nullable();
            $table->string('no_kip', 50)->nullable();
            $table->string('no_pkh', 50)->nullable();
            $table->string('no_kks', 50)->nullable();
            $table->string('home_status', 50)->nullable();
            $table->string('no_kk', 50)->nullable();
            $table->string('father', 100)->nullable();
            $table->string('father_pn', 50)->nullable();
            $table->string('father_nik', 50)->nullable();
            $table->string('father_job', 50)->nullable();
            $table->string('father_graduate', 50)->nullable();
            $table->string('father_income', 50)->nullable();
            $table->string('mother', 100)->nullable();
            $table->string('mother_pn', 50)->nullable();
            $table->string('mother_nik', 50)->nullable();
            $table->string('mother_job', 50)->nullable();
            $table->string('mother_graduate', 50)->nullable();
            $table->string('mother_income', 50)->nullable();
            $table->string('guardian', 100)->nullable();
            $table->string('guardian_pn', 50)->nullable();
            $table->string('guardian_nik', 50)->nullable();
            $table->string('guardian_job', 50)->nullable();
            $table->string('guardian_graduate', 50)->nullable();
            $table->string('guardian_income', 50)->nullable();
            $table->string('guardian_relationship', 50)->nullable();
            $table->string('previous_pondok_name', 100)->nullable();
            $table->string('previous_pondok_address', 100)->nullable();
            $table->string('previous_pondok_div', 100)->nullable();
            $table->string('previous_pondok_time', 100)->nullable();
            $table->string('path_photo', 100)->nullable();
            $table->string('path_bill', 100)->nullable();
            $table->string('path_doc', 100)->nullable();
            $table->string('path_mutasi_emis', 100)->nullable();

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
