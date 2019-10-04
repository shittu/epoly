<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Modules\Admin\Services\Calender\CalenderInfo;
use Modules\Admin\Events\NewAcademicCalenderEvent;
use Modules\Admin\Services\Calender\NewCalender as RegisterNewAcademicCalender;

class NewCalenderCommand extends Command
{
    use CalenderInfo;
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'sospoly:calender-generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command will generate the school calender';

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
        $calender = new RegisterNewAcademicCalender($this->newCalenderInfo());
        event(new NewAcademicCalenderEvent($calender->session));
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    // protected function getArguments()
    // {
    //     return [
    //         ['example', InputArgument::REQUIRED, 'An example argument.'],
    //     ];
    // }

    /**
     * Get the console command options.
     *
     * @return array
     */
    // protected function getOptions()
    // {
    //     return [
    //         ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
    //     ];
    // }
}