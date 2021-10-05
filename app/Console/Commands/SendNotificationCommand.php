<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Services\NotificationService;
use App\Providers\SesProvider;

class SendNotificationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:notification {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para enviar la notificacion';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $id = $this->argument('id');
        $user = User::searchUser($id);
        //Controlamos que exista el usuario
        if ($user !== null) {
            //Generamos una cadena de texto aleatoria de 20 caracteres
            $message = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 20);
            $notificationService = new NotificationService(new SesProvider(app()));
            $result = $notificationService->notify($user, $message);
            //Hacemos el output
            $this->info('id: '. $user->id);
            $this->info('email: '. $user->email);
            $this->info('message: '. $message);
            $this->info('result: '. $result);
        }
        else {
           //Si no existe mostramos por consola el mensaje de error
            $this->info('id: ');
            $this->info('email:');
            $this->info('message: El usuario no existe');
            $this->info('result: '. false);
        }
        
       
    }
}
