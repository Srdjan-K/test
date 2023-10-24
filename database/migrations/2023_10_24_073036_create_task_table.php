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
        Schema::create('tasks', function (Blueprint $table) {
            
            // "id": 1,
            // "name": "Designing and implementing UI components",
            // "is_completed": false,
            // "task_list_id": 1,
            // "position": 0,
            // "start_on": null,
            // "due_on": "2023-01-03T00:00:00.000Z",
            // "labels": [],
            // "open_subtasks": 0,
            // "comments_count": 0,
            // "assignee": [],
            // "is_important": false,
            // "completed_on": null
            
            $table->id();
            
            $table->string('name');
            $table->boolean('is_completed');
            $table->foreignId('task_list_id')->constrained()->onDelete('cascade');
            $table->integer('position');
            $table->dateTime('start_on')->nullable()->default(null);

            $table->dateTime('due_on')->nullable()->default(null);
            $table->text('labels');
            $table->integer('open_subtasks');
            $table->integer('comments_count');
            $table->text('assignee');
            $table->boolean('is_important');
            $table->dateTime('completed_on')->nullable()->default(null);

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
        Schema::dropIfExists('tasks');
    }
};
