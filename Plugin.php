<?php namespace GromIT\SentMails;

use Backend\Facades\Backend;
use Illuminate\Support\Facades\Event;
use GromIT\SentMails\Listeners\AfterSendMail;
use GromIT\SentMails\Listeners\BeforeSendMail;
use System\Classes\PluginBase;

/**
 * SentMails Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails(): array
    {
        return [
            'name'        => 'SentMails',
            'description' => __('gromit.sentmails::lang.plugin.description'),
            'author'      => 'Gromit',
            'icon'        => 'icon-envelope-open'
        ];
    }

    /**
     * Boot method, called right before the request route.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen('mailer.beforeSend', BeforeSendMail::class);
        Event::listen('mailer.send', AfterSendMail::class);
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation(): array
    {
        return [
            'sentmails' => [
                'label'       => __('gromit.sentmails::lang.menu_label'),
                'url'         => Backend::url('gromit/sentmails/mails'),
                'icon'        => 'icon-envelope-open',
                'permissions' => ['gromit.sentmails.*'],
                'order'       => 500,
            ],
        ];
    }
}
