<?php

namespace App\Notifications;

use NotificationChannels\Webhook\WebhookChannel;
use NotificationChannels\Webhook\WebhookMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;

class VerifyPhone extends Notification
{
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [WebhookChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return string
     */
    public function toWebhook($notifiable)
    {
		$verificationUrl = $this->verificationUrl($notifiable);

		return WebhookMessage::create()
            ->data([
				'payload' => [
					'webhook' => [
						'phone' => $notifiable->phone,
						'url' => $verificationUrl,
						'message' => 'Your Tomodachi registration verification code is: ' . $verificationUrl . ' - DO NOT SHARE THIS CODE TO ANYONE INCLUDING ANYBODY WHO CLAIMS FROM TOMODACHI.'
					]
				]
            ])
            ->userAgent("Tomodachi-OtaByte-0x100")
			->header('authorization', "Basic YWhvdDBtb2Q0Y2g6MWJhYWVkMDI4ZTUyNDBlYzdiNTdhZDVkZTkxYzUyODZkZmVmNmMwNWJiNjVjNDE5ZWQ1NjUyZmE1MWY0NTM3ODYzMGRjZjljNzM3Y2I3MDI5YjM3YTFlZDc2OWQzZjAyOTMxZTEyM2UzN2MxNGQ4MTY5NmQ2NjkwNjUwMGUzM2Q=");
    }

    /**
     * Get the verification URL for the given notifiable.
     *
     * @param  mixed  $notifiable
     * @return string
     */
    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'phone.verify',
            Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
            [
                'id' => $notifiable->getKey(),
				'hash' => sha1('x'),
                // 'hash' => sha1($notifiable->getPhoneForVerification()),
            ]
        );
    }
}
