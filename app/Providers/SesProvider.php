<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use app\MailerProviderInterface;

class SesProvider extends ServiceProvider implements MailerProviderInterface
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
        
    }

}
