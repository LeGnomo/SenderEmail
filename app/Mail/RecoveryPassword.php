<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecoveryPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    private $name;
    private $token;
    private $email;

    public function __construct($name,$email,$token)
    {
        $this->name = $name;
        $this->email = $email;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject("Recuperação de Senha");
        $this->to($this->email,$this->name);
        return $this->view('mail.recoveryPassword',['token'=>$this->token,'name'=>$this->name]);
    }
}
