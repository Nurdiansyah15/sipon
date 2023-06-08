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
        Schema::create('acc_trans', function (Blueprint $table) {

            $table->id();
            $table->timestamps();
            $table->foreignId('wallet_id');
            $table->foreignId('account_id');
            $table->string('desc');
            $table->string('nis_operator', 50)->unique()->constrained()->required();
            $table->foreign('nis_operator')->references('nis_santri')->on('users')->cascadeOnDelete();
            $table->bigInteger('in');
            $table->bigInteger('out');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trans');
    }
};
