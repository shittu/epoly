<?php

namespace Modules\Admin\Events;

use Illuminate\Queue\SerializesModels;

class NewAcademicCalenderEvent
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->setCalenderSuccessMessage();
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
    
    public function setCalenderSuccessMessage()
    {
        session()->flash('message','Congratulation the new'.date('Y').'/'.date('Y')+1.' academic calender is registered successfully')
    }
}
