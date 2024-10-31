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
        Schema::create('task_time', function (Blueprint $table) {
            $table->id();
            $table->string('comment');
            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('user_id');
            $table->bigInteger('minutes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_time');
    }
};
