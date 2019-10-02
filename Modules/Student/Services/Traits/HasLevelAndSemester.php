<?php
namespace Modules\Student\Services\Traits;

use Illuminate\Support\Carbon;

trait HasLevelAndSemester

{

    public function level()
    {
        return $this->currentLevel();
    }

    protected function currentLevel()
    {
        $level = null;

        $prefix = $this->levelPrefix();

        switch ($this->yearsSinceAdmission()) {
            case 0:
                $level = $prefix.' 1';
                break;
            case 1:
                $level = $prefix.' 2';
                break;
            default:
                $level = 'SPEAL OVER';
                break;
        }
        return $level;
    }

    public function admissionYearPrefix()
    {
        return substr(date($this->admission->created_at),0,2);
    }

    public function admissionYear()
    {
        return $this->admissionYearPrefix().substr($this->admission->admission_no,0,2);
    }

    public function yearsSinceAdmission()
    {
        return date('Y') - $this->admissionYear();
    }

    public function levelPrefix()
    {
        $prefix = 'ND';
        if($this->studentType->id == 2){
            $prefix = 'HND';
        }
        return $prefix;
    }

}