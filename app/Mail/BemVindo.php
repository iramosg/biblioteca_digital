<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BemVindo extends Mailable
{
    use Queueable, SerializesModels;
    public $nome, $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pNome, $pEmail)
    {
        $this->nome = $pNome;
        $this->email = $pEmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.bemvindo', compact($this->email, $this->nome));
    }
}
