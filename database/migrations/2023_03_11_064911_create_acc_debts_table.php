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
        Schema::create('acc_debts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->bigInteger('amount');
            $table->bigInteger('remainder');
            $table->integer('account_id');

            $table->string('nis', 50)->constrained()->required(); //
            $table->foreign('nis')->references('nis')->on('santris')->cascadeOnDelete();
            $table->string('nis_operator', 50)->unique()->constrained()->required();
            $table->foreign('nis_operator')->references('nis_santri')->on('users')->cascadeOnDelete();

            $table->tinyInteger('payment_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accidentals');
    }
};
