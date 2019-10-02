<?php

namespace Modules\Department\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Department\Entities\Level;

class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $levels = [
            ['name'=>'ND 1','student_type_id'=>1],
            ['name'=>'ND 2','student_type_id'=>1],
            ['name'=>'PRE HND','student_type_id'=>2],
            ['name'=>'HND 1','student_type_id'=>2],
            ['name'=>'HND 2','student_type_id'=>2],
        ];
        foreach ($levels as $level) {
            Level::firstOrCreate($level);
        }
    }
}
