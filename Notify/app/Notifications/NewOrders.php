<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewOrders extends Notification
{
    use Queueable;
// this is the order array
    private $order;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    // Constructor to set the order
    public function __construct($order)
    {
        $this->order = $order;
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

    // This is the mail message that will be sent to the user
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting($this->order['greeting'])
                    ->line($this->order['body'])
                    ->line($this->order['lastline']);
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
