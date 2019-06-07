<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class StaffSendAppraisal extends Mailable
{
    use Queueable, SerializesModels;

    public $supervisorUserID;
    public $staffID;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($supervisorUserID, $staffID)
    {

        $this->supervisorUserID = $supervisorUserID;
        $this->staffID = $staffID;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@mesl.test')
                    ->subject('Staff Appraisal Submitted')
                    ->markdown('emails.staff_appraisal');
    }
}
