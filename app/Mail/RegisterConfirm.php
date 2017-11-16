<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Entities\Auth\User;



class RegisterConfirm extends Mailable
{
    use Queueable, SerializesModels;
	
	private $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
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
    	$url = env('APP_URL') . '/confirm/' . $this->user->id . '/' . $this->user->remember_token;
        return $this->markdown('emails.orders.shipped')->with(['url' => $url]);
    }
}
