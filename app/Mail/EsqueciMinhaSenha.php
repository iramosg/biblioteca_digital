<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Erros;
use Session;
use Redirect;
use Auth;


class EsqueciMinhaSenha extends Mailable
{
    public $nome, $email, $senha;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pNome, $pEmail, $pSenha)
    {
        $this->nome = $pNome;
        $this->email = $pEmail;
        $this->senha = $pSenha;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('biblioteka.digital1@gmail.com','Biblioteka Digital')
        ->view('emails.esquecisenha', compact($this->email, $this->senha, $this->nome));
    }
}
