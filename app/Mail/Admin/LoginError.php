<?php

namespace App\Mail\Admin;

use App\Models\Admin\Users;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LoginError extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $browser;
    public $ip;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Users $user,$browser,$ip)
    {
        //
        $this->user = $user;
        $this->browser = $browser;
        $this->ip = $ip;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.emails.login_error')->subject("Hatalı Giriş");
    }
}
