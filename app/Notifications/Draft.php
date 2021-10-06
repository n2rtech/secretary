<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Draft extends Notification
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
        // ->subject($this->user['subject'])
        ->subject('New Enquiry Recived')
        ->line('Welcome '.$this->user['greeting'])
        ->line('You recived a Enquiry, please check details below.')
        ->line('Enquiry Customer Detail :')
        ->line('Name : '.$this->user['name'].', Email : '.$this->user['email'].', Mobile : '.$this->user['mobile'])
        // ->line('Enquiry Subject : '.$this->user['subject'])
        ->line('Enquiry Message : '.$this->user['body']);
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
