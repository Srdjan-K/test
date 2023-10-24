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
        Schema::create('task_lists', function (Blueprint $table) {

            // "id": 5,
            // "name": "Testing",
            // "open_tasks": 1,
            // "completed_tasks": 1,
            // "position": 4,
            // "is_completed": false,
            // "is_trashed": false
            
            $table->id();
            
            $table->string('name');
            $table->integer('open_tasks');
            $table->integer('completed_tasks');
            $table->integer('position');
            $table->boolean('is_completed');
            $table->boolean('is_trashed');

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
        Schema::dropIfExists('task_lists');
    }
};
