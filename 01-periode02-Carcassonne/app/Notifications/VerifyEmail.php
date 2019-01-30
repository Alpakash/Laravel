<?php
namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Lang;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;

class VerifyEmail extends VerifyEmailBase
{
//    use Queueable;

    // change as you want
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable);
        }
        return (new MailMessage)
            ->subject(Lang::getFromJson('Bevestig NK Carcassonne email'))
            ->line(Lang::getFromJson('Klik de knop hieronder om jouw email te verifiëren.'))
            ->action(
                Lang::getFromJson('E-mailadres bevestigen'),
                $this->verificationUrl($notifiable)
            )
            ->line(Lang::getFromJson('Als je geen account heeft gemaakt dan kun je deze email negeren.'));
    }
}