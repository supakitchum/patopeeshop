<?php

namespace App\Mail;

use App\Model\Report;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $report = Report::find($this->data['rid']);
        return $this->from(env('MAIL_USERNAME'))->subject($this->data['title'])->view('email')->with(['data' =>$this->data,'report' => $report]);
    }
}
