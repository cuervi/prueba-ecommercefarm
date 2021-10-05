<?php
namespace app;

interface MailerProviderInterface
{
    /**
     * 
     * @param String $email
     * @param String $message
     */
    public function send($email, $message);
}

