<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Modules\Department\Entities\Admission;
use Modules\Department\Entities\Department;

class GenerateTestStudentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sospoly:computer-generate-students';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->department = Department::find(1);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $bar = $this->output->createProgressBar(100);

        $bar->setBarWidth(100);

        $bar->start();

        $this->generateMorningNdStudent($bar);

        $this->generateEveningNdStudent($bar);

        $this->generateMorningHndStudent($bar);

        $this->generateEveningHndStudent($bar);

        $bar->finish();
    }

    public function generateEveningNdStudent($bar)
    {
        for ($j=1; $j <= 25 ; $j++) { 
            //generate evening student
            $number = $this->department->generateAdmissionNo(['session'=>0,'year'=>substr(currentSession()->name,7),'type'=>1,'serial_no'=>$j]);
            $this->registerThisStudent(['number'=>$number,'type'=>1,'session'=>2]);
            $this->department->updateDepartmentSessionAdmissionCounter(['session'=>9,'year'=>substr(currentSession()->name,7),'type'=>1,'serial_no'=>$j,'admission_no'=>$number]);
            $bar->advance();
        }
    }

    public function generateMorningNdStudent($bar)
    {
        for ($i=1; $i <= 25 ; $i++) { 
            //generate morning student
            $number = $this->department->generateAdmissionNo(['session'=>9,'year'=>substr(currentSession()->name,7),'type'=>1,'serial_no'=>$i]);
            $this->registerThisStudent(['number'=>$number,'type'=>1,'session'=>1]);
            $this->department->updateDepartmentSessionAdmissionCounter(['session'=>0,'year'=>substr(currentSession()->name,7),'type'=>1,'serial_no'=>$i,'admission_no'=>$number]);
            $bar->advance();
        }
    }

    public function generateEveningHndStudent($bar)
    {
        for ($j=1; $j <= 25 ; $j++) { 
            //generate evening student
            $number = $this->department->generateAdmissionNo(['session'=>0,'year'=>substr(currentSession()->name,7),'type'=>3,'serial_no'=>$j]);
            $this->registerThisStudent(['number'=>$number,'type'=>2,'session'=>2]);
            $this->department->updateDepartmentSessionAdmissionCounter(['session'=>9,'year'=>substr(currentSession()->name,7),'type'=>2,'serial_no'=>$j,'admission_no'=>$number]);
            $bar->advance();
        }
    }

    public function generateMorningHndStudent($bar)
    {
        for ($i=1; $i <= 25 ; $i++) { 
            //generate morning student
            $number = $this->department->generateAdmissionNo(['session'=>9,'year'=>substr(currentSession()->name,7),'type'=>3,'serial_no'=>$i]);
            $this->registerThisStudent(['number'=>$number,'type'=>2,'session'=>1]);
            $this->department->updateDepartmentSessionAdmissionCounter(['session'=>0,'year'=>substr(currentSession()->name,7),'type'=>2,'serial_no'=>$i,'admission_no'=>$number]);
            $bar->advance();
        }
    }

    public function registerThisStudent(array $data)
    {
        $admission = Admission::firstOrCreate([
            'admission_no'=>$data['number'],
            'head_of_department_id'=>1,
            'department_id'=>1,
            'session_id'=>1,
            'year'=> substr(currentSession()->name, 5)
        ]);
        $student = $admission->student()->firstOrCreate([
            'first_name'=> 'first name',
            'last_name'=> 'last name',
            'user_name'=>$data['number'],
            'email'=> $data['number'].'@sospoly.com',
            'phone'=>'08243434343',
            'student_session_id'=> $data['session'],
            'student_type_id'=>  $data['type'],
            'password'=> Hash::make($data['number']),
        ]);
        $student->studentAccount()->firstOrCreate([
            'gender_id'=>rand(1,2),
            'tribe_id'=>rand(1,3),
            'religion_id'=>rand(1,3)
        ]);
    }
}
