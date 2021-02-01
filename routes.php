<?php

use Backend\Facades\BackendAuth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use GromIT\SentMails\Models\Mail;

Route::prefix('_mails')->group(static function () {
    Route::get('view/{token}', static function (string $token) {
        /** @var Mail $mail */
        $mail = Mail::whereToken($token)->first();

        if ($mail === null) {
            return '';
        }

        return Storage::get($mail->file);
    });

    Route::get('open/{token}', static function (string $token) {

        /** @noinspection PhpUndefinedMethodInspection */
        if (!BackendAuth::check()) {
            /** @var Mail $mail */
            $mail = Mail::whereToken($token)->first();

            if ($mail) {
                $mail->see();
            }
        }

        $gif = file_get_contents(plugins_path('gromit/sentmails/assets/pixel.gif'));

        return response($gif, 200, [
            'Content-type' => 'image/gif'
        ]);
    });
});
