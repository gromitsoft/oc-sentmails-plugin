<?php

namespace GromIT\SentMails\Models;

use October\Rain\Database\Model;
use System\Behaviors\SettingsModel;

/**
 * @method static mixed get(string $key, mixed $default = null)
 */
class Settings extends Model
{
    public $implement = [SettingsModel::class];

    public $settingsCode = 'gromit_sentmails_settings';

    public $settingsFields = 'fields.yaml';

    public function getDiskOptions()
    {
        return collect(config('filesystems.disks'))
            ->keys()
            ->mapWithKeys(function ($label) {
                return [$label => $label];
            })
            ->all();
    }

    public static function getDisk()
    {
        return self::get('disk');
    }
}
