<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailNewUserEmailConfirmation extends Mailable
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
        $this->user     =   $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $activation_link     =  url('/api/auth/register/activate/'  .
                                    $this->user->id .   '/'  .
                                    $this->user->token
                                );

        return $this->view('emails/register_email_confirmation')->with([
            'name'              =>  $this->user->name,
            'email'             =>  $this->user->email,
            'lang'              =>  'en',
            'activation_link'   =>  $activation_link,
            'datetime'          =>  now()->setTimezone('America/Sao_Paulo')->format('m-d-Y H:i:s'),
        ]);
    }
}
