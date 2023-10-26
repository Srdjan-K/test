<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::table('users')->truncate();
        DB::table('tasks')->truncate();
        DB::table('task_lists')->truncate();


        DB::unprepared(File::get(base_path() . '/database/seeders/DatabaseTablesWithData/users.sql'));
        DB::unprepared(File::get(base_path() . '/database/seeders/DatabaseTablesWithData/tasks.sql'));
        DB::unprepared(File::get(base_path() . '/database/seeders/DatabaseTablesWithData/task_lists.sql'));
        DB::unprepared(File::get(base_path() . '/database/seeders/DatabaseTablesWithData/labels.sql'));

    }
}
