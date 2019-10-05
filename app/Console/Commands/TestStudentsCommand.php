<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Modules\Department\Entities\Admission;

class TestStudentsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sospoly:student-generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command will create dummy account of 2000 students for testing the result upload';

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

        for ($i=1; $i <= 5 ; $i++) { 
            switch ($i) {
                case '1':
                    //create 500 NDI student
                    for ($j=1; $j <=500 ; $j++) { 
                        $number = '191'.$this->getSerialNumber($j);
                        $this->registerThisStudent($number);
                        $bar->advance(); 
                    }
                    break;
                case '2':
                    //create 500 NDII student
                    for ($k=1; $k <=500 ; $k++) { 
                        $number = '181'.$this->getSerialNumber($k);
                        $this->registerThisStudent($number);
                        $bar->advance(); 
                    }
                    break;
                case '3':
                    //create 500 HNDI student
                    for ($l=1; $l <=500 ; $l++) { 
                        $number = '190'.$this->getSerialNumber($l);
                        $this->registerThisStudent($number);
                        $bar->advance(); 
                    }
                    break;
                case '4':
                    //create 500 HNDII student
                    for ($m=1; $m <=500 ; $m++) {
                        $number = '181'.$this->getSerialNumber($m);
                        $this->registerThisStudent($number);
                        $bar->advance();
                    }    
                    break;
                
                default:
                    for ($n=1; $n <=500 ; $n++) {
                        $number = '182'.$this->getSerialNumber($n);
                        $this->registerThisStudent($number);
                        $bar->advance();
                    }
                    break;
            }
            
        }
        $bar->finish();
    }

    public function getSerialNumber($number)
    {
        if($number < 10){
            $new_number = '00'.$number;
        }else if ($number < 100) {
            $new_number = '0'.$number;
        }else{
            $new_number = $number;;
        }
        return $new_number;
    }
    public function registerThisStudent($number)
    {
        $admission = Admission::firstOrCreate([
            'admission_no'=>$number,
            'head_of_department_id'=>1
        ]);
        $student = $admission->student()->firstOrCreate([
            'first_name'=> 'first name',
            'last_name'=> 'last name',
            'email'=> $number.'@sospoly.com',
            'phone'=>'08243434343',
            'student_session_id'=> 1,
            'student_type_id'=>  1,
            'password'=> Hash::make($number),
        ]);
        $student->studentAccount()->firstOrCreate([
            'gender_id'=>1,
            'tribe_id'=>1,
            'religion_id'=>1
        ]);
    }
}
