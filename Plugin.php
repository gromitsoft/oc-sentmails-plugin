<?php namespace GromIT\SentMails;

use Backend\Facades\Backend;
use GromIT\SentMails\Listeners\AfterSendMail;
use GromIT\SentMails\Listeners\BeforeSendMail;
use GromIT\SentMails\Models\Settings;
use Illuminate\Support\Facades\Event;
use System\Classes\PluginBase;
use System\Classes\SettingsManager;

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
            'description' => 'gromit.sentmails::lang.plugin.description',
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
                'label'       => 'gromit.sentmails::lang.menu_label',
                'url'         => Backend::url('gromit/sentmails/mails'),
                'icon'        => 'icon-envelope-open',
                'permissions' => ['gromit.sentmails.*'],
                'order'       => 500,
            ],
        ];
    }

    /**
     * registerSettings registers any back-end configuration links used by this plugin.
     *
     * @return array
     */
    public function registerSettings()
    {
        return [
            'sentmails_settings' => [
                'label'       => 'SentMails',
                'description' => 'gromit.sentmails::lang.plugin.settings.sentmails.description',
                'category'    => SettingsManager::CATEGORY_MAIL,
                'icon'        => 'icon-envelope-open',
                'class'       => Settings::class,
                'order'       => 500,
                'keywords'    => 'mail disk',
            ]
        ];
    }
}
