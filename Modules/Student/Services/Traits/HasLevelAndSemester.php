<?php
namespace Modules\Student\Services\Traits;

use Illuminate\Support\Carbon;
use Modules\Department\Entities\Level;

trait HasLevelAndSemester

{
    public function courses()
    {
        return $this->level()->courses;
    }

    public function carryOvers()
    {
        return $this->repeatCourseRegistrations->where('status',1);
    }
    // stage = 1 means iwant the previos student level while stage = 0 means i want the the current student level
    public function level()
    {
        return Level::where('name',$this->currentLevel())->first();
    }

    protected function currentLevel()
    {
        $level = null;

        $prefix = $this->levelPrefix();

        switch ($this->yearsSinceAdmission() - 1) {
            case 0:
                $level = $prefix.' 1';
                break;
            case 1:
                $level = $prefix.' 2';
                break;
            default:
                $level = 'SPILL OVER';
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
        }else if($this->studentType->id == 3){
            $prefix = 'CONVERSION';
        }
        return $prefix;
    }

}