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
            
            $table->id();
            
            $table->string('name');
            $table->integer('open_tasks')->default(0);
            $table->integer('completed_tasks')->default(0);
            $table->integer('position')->default(0);
            $table->boolean('is_completed')->default(false);
            $table->boolean('is_trashed')->default(false);

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
