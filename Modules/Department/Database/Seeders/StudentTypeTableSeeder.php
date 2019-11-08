<?php

namespace Modules\Department\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Student\Entities\StudentType;

class StudentTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $types = [
            ['name'=>'ND','code'=>1],
            ['name'=>'HND','code'=>3]
        ];
        foreach ($types as $type) {
            StudentType::firstOrCreate($type);
        }
    }
}
