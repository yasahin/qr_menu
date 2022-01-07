<?php

namespace App\Mail\Admin;

use App\Models\Admin\Users;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TwoFactor extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Users $user)
    {
        //

        $this->user = $user;

        if(!\Cache::has($user->token)){
            \Cache::put($user->token,rand(100000,999999),120);
        }

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.emails.two_factor')->subject("İki Adımlı Kimlik Doğrulama");
    }
}
