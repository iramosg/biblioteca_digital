<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NovoLivro extends Mailable
{
    use Queueable, SerializesModels;
    public $nome, $titulo, $categoria, $sinopse, $link;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pNome, $pTitulo, $pCategoria, $pSinopse, $pLink)
    {
        $this->nome = $pNome;
        $this->titulo = $pTitulo;
        $this->categoria = $pCategoria;
        $this->sinopse = $pSinopse;
        $this->link = $pLink;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.novolivro', compact($this->nome, $this->titulo, $this->categoria, $this->sinopse, $this->link));
    }
}
