<?php

use Illuminate\Database\Seeder;
use Modules\Admin\Database\Seeders\AdminDatabaseSeeder;
use Modules\Staff\Database\Seeders\StaffDatabaseSeeder;

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
        $this->call(staffDatabaseSeeder::class);
    }
}
