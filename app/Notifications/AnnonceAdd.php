<?php

namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\User;

class AnnonceAdd extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

  protected $name;
    public function __construct($name)
    {
        $this->name= $name;  
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
            
                        ->line('Vous avez une nouvelle annonce')
                        ->line('--------------------------------------')
                        ->line('Un propriétaire à ajouter une nouvelle propriété')
                        ->line('--------------------------------------')
                        ->action('Voir cette annonce', route('admin'));
        
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        //
    }
}
