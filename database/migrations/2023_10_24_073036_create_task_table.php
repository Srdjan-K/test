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

            $table->id();
            
            $table->string('name');
            $table->boolean('is_completed')->default(false);
            $table->foreignId('task_list_id')->constrained()->onDelete('cascade');
            $table->integer('position')->default(0);
            $table->dateTime('start_on')->nullable()->default(null);

            $table->dateTime('due_on')->nullable()->default(null);
            $table->string('labels')->default("[]");
            $table->integer('open_subtasks')->default(0);
            $table->integer('comments_count')->default(0);
            $table->string('assignee')->default("[]");
            $table->boolean('is_important')->default(false);
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
