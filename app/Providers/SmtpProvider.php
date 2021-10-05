<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\MailerProviderInterface;

class SmtpProvider extends ServiceProvider implements MailerProviderInterface
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
    
    public function send($email, $message) {
        return true;
    }

}
