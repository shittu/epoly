<?php

namespace Modules\Department\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Department\Entities\Department;
use Illuminate\Database\Eloquent\Model;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $departments = [
            ['name'=>'Computer Science','description'=>'college description','established_date'=>'2019-10-03 18:52:00','college_id'=>1],
            ['name'=>'Mathematics','description'=>'college description','established_date'=>'2019-10-03 18:52:00','college_id'=>1],
            ['name'=>'Statistics','description'=>'college description','established_date'=>'2019-10-03 18:52:00','college_id'=>1],
        ];
        foreach($departments as $department){
            Department::firstOrCreate($department);
        }
    }
}
