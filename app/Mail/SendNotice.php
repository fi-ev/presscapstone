<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendNotice extends Mailable
{
    use Queueable, SerializesModels;
    public $subject;
    public $name;
    public $content;

    public function __construct($subject, $name, $content)
    {
        $this->subject = $subject;
        $this->name = $name;
        $this->content = $content;
    }

    public function attachments(): array
    {
        return [];
    }

    public function build()
    {
        return $this->subject($this->subject)
                    ->view('emails.notice')
                    ->with([
                        'subject' => $this->subject,
                        'name' => $this->name,
                        'content' => $this->content,
                ]);
    }
}
