<?php
/**
 * Created by PhpStorm.
 * User: comol
 * Date: 30/07/2016
 * Time: 11:56 PM
 */

namespace App\Helpers;


use App\User;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Mail;

class ActivationService
{
    protected $mailer;
    protected $activationRepo;
    protected $resendAfter=24;

    public function __construct(Mailer $mailer, ActivationRepository $activationRepo)
    {
        $this->mailer=$mailer;
        $this->activationRepo=$activationRepo;
    }

    public function sendActivationMail($user){
        if($user->is_Active || !$this->shouldSend($user)){
            return;
        }

        $token=$this->activationRepo->createActivation($user);

        $link=route('user.activate', $token);

        /*$message = sprintf('Activate account <a href="%s">%s</a>', $link, $link);

        $this->mailer->raw($message, function (Message $m) use ($user) {
            $m->to($user->email)->subject('Activation mail');
        });*/

        $message = [
            'activation_link'=> $link,
        ];

        Mail::send('emails.activation_link', $message, function($message) use ($user){
            $message->to($user->email)
                    ->subject('Activate account (Driving Instructors Catalog)')
                    ->sender('comolroy@gmail.com', 'Driving Instructors Catalog');
        });
    }

    public function activateUser($token){
        $activation = $this->activationRepo->getActivationByToken($token);

        if($activation === null){
            return null;
        }

        $user = User::find($activation->user_id);
        $user->is_active=true;
        $user->save();

        $this->activationRepo->deleteActivation($token);

        return $user;
    }

    private function shouldSend($user)
    {
        $activation = $this->activationRepo->getActivation($user);
        return $activation === null || strtotime($activation->created_at) + 60 * 60 * $this->resendAfter < time();
    }

}