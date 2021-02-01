<?php

namespace GromIT\SentMails\Listeners;

use Illuminate\Support\Facades\View;
use Ramsey\Uuid\Uuid;

class BeforeSendMail
{
    /**
     * @throws \Exception
     */
    public function handle()
    {
        $mailToken = Uuid::uuid4()->toString();

        session()->put('mailUuid', $mailToken);

        $linkToMail = url("_mails/view/{$mailToken}");
        $pixelLink  = url("_mails/open/{$mailToken}");

        View::share('_mail_link', $linkToMail);
        View::share('_mail_pixel', $pixelLink);
    }
}
