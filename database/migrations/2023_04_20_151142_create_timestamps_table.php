<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('timestamps', function (Blueprint $table) {

            $table->id();
            $table->timestamp('time_in')->nullable();
            $table->string('time_in_comment')->nullable();
            $table->string('time_in_image')->nullable();

            $table->timestamp('time_out')->nullable();
            $table->string('time_out_comment')->nullable();
            $table->string('time_out_image')->nullable();

            $table->timestamp('break_in')->nullable();
            $table->timestamp('break_out')->nullable();
            $table->string('break_time_comment')->nullable();

            $table->foreignIdFor(User::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timestamps');
    }
};
