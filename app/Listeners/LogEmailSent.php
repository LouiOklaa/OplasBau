<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Log;
use App\Models\EmailLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Events\MessageSent;
use Illuminate\Queue\InteractsWithQueue;

class LogEmailSent
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(MessageSent $event): void
    {

        $data = $event->data['data'] ?? null;

        if ($data) {
            $toEmail = $data['email'] ?? 'no-email';
            $toName = $data['name'] ?? 'no-name';
            $toMessage = $data['message'] ?? 'no-message';

            // تسجيل بيانات البريد الإلكتروني في قاعدة البيانات
            EmailLog::create([
                'name' => $toName,
                'email' => $toEmail,
                'message' => $toMessage,
                'sent_at' => now(),
            ]);
        }
    }

}
