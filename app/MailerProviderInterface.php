<?php
namespace App;

interface MailerProviderInterface
{
    public function send($email, $message);
}

