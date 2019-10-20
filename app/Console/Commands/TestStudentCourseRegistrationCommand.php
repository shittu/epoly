<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Modules\Admin\Entities\Session;
use Modules\Student\Entities\Student;
use Modules\Department\Entities\Level;

class TestStudentCourseRegistrationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sospoly:student-courses-registration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command will make 2000 students courses registration 10 foreach';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $bar = $this->output->createProgressBar(2500);

        $bar->setBarWidth(100);

        $bar->start();
        foreach(Student::cursor() as $student){
            $level = Level::where('name',$student->level())->first();
            $session_registration = $student->sessionRegistrations()->firstOrCreate([
            'level_id'=>$level->id,
            'department_id'=>$student->admission->department_id,
            'session_id'=> currentSession()->id
            ]);

            foreach($level->courses as $course){
                $semester_registration = $session_registration->semesterRegistrations()->firstOrCreate(['semester_id'=>$course->semester->id]);
                $course_registration = $semester_registration->courseRegistrations()->firstOrCreate([
                    'course_id'=>$course->id,
                ]);
                $course_registration->result()->firstOrCreate([]);
                $bar->advance();
            }
        }
        $bar->finish();
    }
}
