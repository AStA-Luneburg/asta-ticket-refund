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
        Schema::create('refunds', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->foreign('email')
                  ->references('email')
                  ->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->string('name');
            $table->string('iban');

            $table->unsignedBigInteger('export_id')->nullable();
                  // CASCADES are not used for a reason!
                  // let's not have people delete data on accident.
                  // If an export is deleted, and we 'set null', we can't differenciate between them and new ones

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
        Schema::dropIfExists('refunds');
    }
};
