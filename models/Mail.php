<?php namespace GromIT\SentMails\Models;

use Illuminate\Support\Facades\Storage;
use October\Rain\Database\Builder;
use October\Rain\Database\Model;
use October\Rain\Database\Traits\Nullable;

/**
 * Mail Model
 *
 * @property int                            $id
 * @property string                         $token
 * @property string                         $from
 * @property array                          $to
 * @property array                          $subject
 * @property string                         $file
 * @property \October\Rain\Argon\Argon|null $opened_at;
 * @property \October\Rain\Argon\Argon|null $created_at
 * @property \October\Rain\Argon\Argon|null $updated_at
 *
 * @method static Builder|self query()
 * @method static Builder|self whereToken(string $token)
 */
class Mail extends Model
{
    public $table = 'gromit_sentmails_mails';

    protected $fillable = [
        'token',
        'from',
        'to',
        'subject',
        'file',
    ];

    protected $dates = [
        'opened_at',
    ];

    protected $jsonable = [
        'to',
    ];

    use Nullable;

    protected $nullable = [
        'subject',
        'opened_at',
    ];

    protected function afterDelete()
    {
        Storage::delete($this->file);
    }

    public function see(): bool
    {
        $this->opened_at = now();
        return $this->save();
    }
}
