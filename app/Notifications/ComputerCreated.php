<?php

namespace App\Notifications;

use App\Computer;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ComputerCreated extends Notification
{
    use Queueable;
    public $computer;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Computer $computer)
    {
        $this->computer = $computer;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database'];
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
            ->subject('Notification: A computer has been added - : ' . $this->computer->model)
            ->greeting('Great News!')
            ->line('A new computer has been added to the website.')
            ->action('Computer info... : ', url('/computer/'. $this->computer->slug))
            ->line('Thank you for using our application!')
            ->salutation('Powered by Laravel');
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
            'book' => $this->computer
        ];
    }
}