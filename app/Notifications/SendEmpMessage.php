<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendEmpMessage extends Notification
{
    use Queueable;

private $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
       $this->user = $user; 
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->bcc('besked@nordiccall.dk')
        ->subject('NordicCall')
        ->line('Besked fra: NordicCall')
        ->line('...............................')
        ->line($this->user['modtaget'])
        ->line($this->user['to'])
        ->line('...............................')
        ->line($this->user['email'])
        ->line(' ')
        ->line($this->user['message'])
        ->line(' ')  
        ->line($this->user['name'])
        ->line($this->user['mobile'])
        ->line('...............................')
        ->line('Status: ')
        ->line($this->user['status']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
