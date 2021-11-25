<?php

namespace App\Mail;

use App\Models\Clientes;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class clientesMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Clientes $cliente, $email)
    {
        $this->cliente = $cliente;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject(subject: 'All Blacks - Contatos');
        $this->to($this->cliente->email, $this->cliente->nome);

        return $this->view('emails.email', ['nome' => $this->cliente->nome, 'mensagem' => $this->email]);
    }
}
