<?php

namespace App\Mail;

use App\Appraisal;
use App\Staff;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RejectStaffGoals extends Mailable
{
    use Queueable, SerializesModels;

    public $staff;
    public $appraisal;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Staff $staff, Appraisal $appraisal)
    {
        $this->staff = $staff;
        $this->appraisal = $appraisal;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.reject_staff_goals');
    }
}
