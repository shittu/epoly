<?php

namespace Modules\Department\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Department\Entities\Course;
use Illuminate\Database\Eloquent\Model;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        //create 10 NDI courses
        for ($i = 1; $i <= 10 ; $i++) {
            $i = '0'.$i;
            if($i > 9){
                $i = $i;
            }
            $unit = 1;
            if($unit >= 4){
                $unit = 1;
            }else{
                $unit++;
            }
            $semester_id = 1;
            if($semester_id >= 2){
                $semester_id = 1;
            }else{
                $semester_id++;
            }  
            Course::firstOrCreate([
                'code'=>'COM 1'.$i,
                'title'=>'course title here',
                'unit'=> $unit,
                'department_id' => 1,
                'semester_id'=> $semester_id,
                'level_id' => 1
            ]);
        }
        //create 10 NDII courses
        for ($i = 1; $i <= 10 ; $i++) {
            $i = '0'.$i;
            if($i > 9){
                $i = $i;
            }
            $unit = 1;
            if($unit >= 4){
                $unit = 1;
            }else{
                $unit++;
            }
            $semester_id = 1;
            if($semester_id >= 2){
                $semester_id = 1;
            }else{
                $semester_id++;
            }  
            Course::firstOrCreate([
                'code'=>'COM 2'.$i,
                'title'=>'course title here',
                'unit'=> $unit,
                'department_id' => 1,
                'semester_id'=> $semester_id,
                'level_id' => 2
            ]);
        }
        //create 10 HNDI courses
        for ($i = 1; $i <= 10 ; $i++) {
            $i = '0'.$i;
            if($i > 9){
                $i = $i;
            }
            $unit = 1;
            if($unit >= 4){
                $unit = 1;
            }else{
                $unit++;
            }
            $semester_id = 1;
            if($semester_id >= 2){
                $semester_id = 1;
            }else{
                $semester_id++;
            }  
            Course::firstOrCreate([
                'code'=>'COM 3'.$i,
                'title'=>'course title here',
                'unit'=> $unit,
                'department_id' => 1,
                'semester_id'=> $semester_id,
                'level_id' => 4
            ]);
        }
        //create 10 HNDII courses
        for ($i = 1; $i <= 10 ; $i++) {
            $i = '0'.$i;
            if($i > 9){
                $i = $i;
            }
            $unit = 1;
            if($unit >= 4){
                $unit = 1;
            }else{
                $unit++;
            }
            $semester_id = 1;
            if($semester_id >= 2){
                $semester_id = 1;
            }else{
                $semester_id++;
            }  
            Course::firstOrCreate([
                'code'=>'COM 4'.$i,
                'title'=>'course title here',
                'unit'=> $unit,
                'department_id' => 1,
                'semester_id'=> $semester_id,
                'level_id' => 5
            ]);
        }   
    }
}
