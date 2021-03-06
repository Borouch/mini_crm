<?php

namespace App\Notifications;

use App\Models\Company;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CreateCompanyNotification extends Notification
{
    use Queueable;

    protected $company;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

        /**
         * Route notifications for the mail channel.
         *
         * @param  \Illuminate\Notifications\Notification $notification
         * @return array|string
         */
    public function routeNotificationForMail($notification)
    {
        // Return email address only...
        return $this->email;

    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $id= $this->company->id;
        $name = $this->company->name;
        return (new MailMessage)
            ->line('New company has been created')
            ->line("Name: $name")
            ->action('View details', url("/companies/$id"))
            ->line('Have a nice day!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
