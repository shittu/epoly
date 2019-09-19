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
            'PRE ND',
            'ND 1',
            'ND 2',
            'PRE HND',
            'HND 1',
            'HND 2',
        ];
        foreach ($levels as $level) {
            Level::firstOrCreate(['name'=>$level]);
        }
    }
}
