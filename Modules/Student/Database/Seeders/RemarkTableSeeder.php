<?php

namespace Modules\Student\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Student\Entities\Remark;
use Illuminate\Database\Eloquent\Model;

class RemarkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $remarks = [
            ['name'=>'Cancelation of Semester','remark_type_id'=>2],
            ['name'=>'Withdraw','remark_type_id'=>2],
            ['name'=>'Cancelation of Session','remark_type_id'=>2],
            ['name'=>'Cancelation of Exam','remark_type_id'=>2],
            ['name'=>'Pass','remark_type_id'=>1],
            ['name'=>'Fail','remark_type_id'=>1],
            ['name'=>'Sick','remark_type_id'=>1],
            ['name'=>'Incomplete Project','remark_type_id'=>1],
            ['name'=>'Absent','remark_type_id'=>1],
        ];
        foreach ($remarks as $remark) {
            Remark::firstOrCreate($remark);
        }
    }
}
