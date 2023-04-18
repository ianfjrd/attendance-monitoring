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
        Schema::create('timestamp_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('timestamp_id')->constrained('timestamps');
            $table->string('date');
            $table->string('halfDayRequest')->nullable(); /*true or false*/
            $table->string('halfDayRequestStatus')->nullable(); /* null = no request | pending = waiting to approve | approved = request approved  */
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
        Schema::dropIfExists('timestamp_user');
    }
};
