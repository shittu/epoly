<?php

namespace Modules\Staff\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Staff\Entities\StaffType;

class StaffTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $staffs = ['Academic','Non Academic'];
        foreach ($staffs as $staff) {
            StaffType::firstOrCreate(['name'=>$staff]);
        }
    }
}
