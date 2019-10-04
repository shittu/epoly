<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Staff\Entities\Staff;
use Illuminate\Database\Eloquent\Model;

class AppointmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $staff = Staff::find(2);
        //create new head of the department
        $staff->department->headOfDepartments()->create([
            'email'=>$staff->email,
            'password'=>$staff->password,
            'admin_id'=>admin()->id,
            'department_id' => $staff->department->id,
            'staff_id' => $staff->id,
            'from'=> $request->appointment_date
        ]);
        $staff = Staff::find(1);
        $staff->department->college->directers()->create([
                'email'=>$staff->email,
                'password'=>$staff->password,
                'admin_id'=>admin()->id,
                'college_id' => $staff->department->college->id,
                'staff_id' => $staff->id,
                'from'=> $request->appointment_date
            ]);
    }
}
