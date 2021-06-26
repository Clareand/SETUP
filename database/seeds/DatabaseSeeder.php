<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ProvincesSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(TechFieldsTableSeeder::class);
        $this->call(BadgesTableSeeder::class);
        $this->call(ClassListsTableSeeder::class);
        $this->call(MaterialsTableSeeder::class);
        $this->call(TasksTableSeeder::class);
        $this->call(ModuleListsTableSeeder::class);
        $this->call(LearningPathsTableSeeder::class);
        $this->call(ClassPathTableSeeder::class);
        $this->call(TaskFieldsTableSeeder::class);
        $this->call(TaskFieldOptionsTableSeeder::class);
    }
}