<?php
namespace App\Services;

use App\Models\User;

class NotificationService {

    protected $user;
    protected $message;

    public function __construct (User $user, $message) {
        $this->user = $user;
        $this->message= $message;
    }
}