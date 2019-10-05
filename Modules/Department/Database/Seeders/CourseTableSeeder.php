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
    public $unit = null;
    public $semester = null;

    public function run()
    {
        Model::unguard();
        //lets create five level courses each level 20 course = 100
        for ($i=1; $i <=5 ; $i++) { 
            for ($j=1; $j <= 20 ; $j++) { 
                $this->updateUnit();
                $this->updatSemester();
                $this->createCourses($i,$j);
            }
        }   
    }
    public function updateUnit()
    {
        if(!$this->unit){
            $this->unit = 1;
        }
        if($this->unit >= 4){
            $this->unit = 1;
        }else{
            $this->unit++;
        }
    }

    public function updatSemester()
    {
        if(!$this->semester){
            $this->semseter = 1;
        }

        if($this->semester > 1){
            $this->semester = 1;
        }else{
            $this->semester++;
        }
    }

    public function createCourses($i,$j)
    {
        Course::firstOrCreate([
                'code'=>'COM '.$i.$this->getCourseSerialNumber($j),
                'title'=>'course title here',
                'unit'=> $this->unit,
                'department_id' => 1,
                'semester_id'=> $this->semester,
                'level_id' => $i
            ]);
    }

    public function getCourseSerialNumber($i)
    {
        if($i > 9){
            $i = $i;
        }else{
            $i = '0'.$i;
        }
        return $i;
    }
}
