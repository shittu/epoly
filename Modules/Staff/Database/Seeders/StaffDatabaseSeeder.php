<?php

namespace Modules\Staff\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class StaffDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(GenderTableSeeder::class);
        $this->call(ReligionTableSeeder::class);
        $this->call(StaffTypeTableSeeder::class);
        $this->call(TribeTableSeeder::class);
    }
}
