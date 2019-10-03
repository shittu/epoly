<?php

use Illuminate\Database\Seeder;
use Modules\Admin\Database\Seeders\AdminDatabaseSeeder;
use Modules\Staff\Database\Seeders\StaffDatabaseSeeder;
use Modules\Student\Database\Seeders\StudentDatabaseSeeder;
use Modules\Department\Database\Seeders\DepartmentDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminDatabaseSeeder::class);
        $this->call(StaffDatabaseSeeder::class);
        $this->call(DepartmentDatabaseSeeder::class);
        $this->call(StudentDatabaseSeeder::class);
    }
}
