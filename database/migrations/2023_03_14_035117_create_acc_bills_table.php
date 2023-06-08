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
        Schema::create('acc_bills', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('bill_amount');
            $table->bigInteger('bill_remainder');
            $table->string('due_date');
            $table->foreignId('account_id');



            $table->string('nis', 50)->constrained()->required(); //
            $table->foreign('nis')->references('nis')->on('santris')->cascadeOnDelete();
            $table->string('nis_operator', 50)->unique()->constrained()->required();
            $table->foreign('nis_operator')->references('nis_santri')->on('users')->cascadeOnDelete();


            $table->integer('payment_status');
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
        Schema::dropIfExists('bills');
    }
};
