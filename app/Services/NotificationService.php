<?php
namespace App\Services;

use App\Models\User;

class NotificationService {

    protected $provider;

    public function __construct ($provider) {
        $this->provider = $provider;
    }
    
    /**
     * Se envia la notificación al usando el provider sobre el que se haya construido
     * @param User $user
     * @param String $message
     */
    public function notify (User $user, $message) {
        return $this->provider->send($user->email, $message);
    }
    
}