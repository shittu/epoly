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

        $sessions = [
            ['name'=>'MORNING','code'=>9],['name'=>'EVENING','code'=>0]];
        foreach ($sessions as $session) {
            StudentSession::firstOrCreate($session);
        }
    }
}
