<?php

namespace GromIT\SentMails\Listeners;

use GromIT\SentMails\Models\Mail;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Storage;
use October\Rain\Mail\Mailer;

class AfterSendMail
{
    /**
     * @param \October\Rain\Mail\Mailer $mailer
     * @param string                    $view
     * @param \Illuminate\Mail\Message  $message
     *
     * @return void
     * @throws \Exception
     * @noinspection PhpUnusedParameterInspection
     */
    public function handle(Mailer $mailer, string $view, Message $message)
    {
        $from = $message->getFrom();

        $fromName    = reset($from);
        $fromAddress = key($from);

        $from  = "{$fromName} <$fromAddress>";
        $to    = [
            'to'  => $message->getTo() ?? [],
            'cc'  => $message->getCc() ?? [],
            'bcc' => $message->getBcc() ?? [],
        ];
        $body  = $message->getBody();
        $token = session()->get('mailUuid');

        session()->forget('mailUuid');

        $fileName = $token . '.html';

        $path = implode('/', array_slice(str_split($fileName, 3), 0, 3)) . '/';
        $path = "mails/{$path}/$fileName";

        Storage::put($path, $body);

        Mail::create([
            'token'   => $token,
            'from'    => $from,
            'to'      => $to,
            'subject' => $message->getSubject(),
            'file'    => $path,
        ]);
    }
}
