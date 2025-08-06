<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeUserMail extends Mailable
    {
        use Queueable, SerializesModels;

        public $user; // user ko pass karenge

        public function __construct($user)
        {
            $this->user = $user;
        }

        public function build()
        {
            return $this->subject('Welcome To My Project')
                        ->view('emails.welcome');
        }
    }
