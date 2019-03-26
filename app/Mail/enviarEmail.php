<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Crypt;

class enviarEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //$contraseña = Crypt::decrypt($this->user->password);
        //$email = $this->user->email;
        return $this->from('angelmava37@gmail.com')
                            ->view('mails.enviar')
                            ->text('mails.demo_plain')
                            ->with(
                                [
                                    'email' => $this->user->email,
                                    'contraseña' => $this->user->password,
                                ]);
    }
}
