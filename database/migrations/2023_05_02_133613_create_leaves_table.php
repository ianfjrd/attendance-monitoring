<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->string('date_start');
            $table->string('date_end');
            $table->string('leaves_status'); //Pending or Approved
            $table->string('status'); // Ongoing, Upcoming, and Done
            $table->foreignId('leave_types_id')->constrained('leave_types');
            $table->string('reason');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
