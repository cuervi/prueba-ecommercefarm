<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Services\NotificationService;
use App\Providers\SmtpProvider;

class NotificationsController extends Controller
{
    /**
     * Método para enviar la notificación por SMTP
     * 
     * GET: /users/send_notification/{id}
     * 
     * @param unknown $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendNotification ($id) {
        //cogemos el usuario
        $user = User::searchUser($id);
        //Generamos una cadena de texto aleatoria de 20 caracteres
        $message = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
        $notificationService = new NotificationService(new SmtpProvider(app()));
        $result = $notificationService->notify($user, $message);
        
        return response()->json([
           'id' => $user->id,
           'email' => $user->email,
           'message' => $message,
           'result' => $result
        ]);
    }
}

