<?php

namespace App\Services;


use App\Mail\DefaultMail;
use Illuminate\Support\Facades\Mail;

Class MailSenderService
{
    public static function sendMail(string $name, string $toMail, string $mailSubject, string $content)
    {
        Mail::send(new DefaultMail(
            name: $name,
            toMail: $toMail,
            mailSubject: $mailSubject,
            content: $content));
    }
} // End Class
