<?php

namespace Modules\Department\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Student\Entities\StudentSession;

class StudentSessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $sessions = ['MORNING','EVENING'];
        foreach ($sessions as $session) {
            StudentSession::firstOrCreate(['name'=>$session]);
        }
    }
}
