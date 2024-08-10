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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('identifier');
            $table->string('name');
            $table->text('description');
            $table->integer('story_points')->nullable();
            $table->unsignedBigInteger('stage_id');
            $table->unsignedBigInteger('priority_id');
            $table->unsignedBigInteger('reporter_id');
            $table->unsignedBigInteger('assignee_id');
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('parent_task_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
