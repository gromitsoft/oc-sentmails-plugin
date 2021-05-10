<?php namespace GromIT\SentMails\Controllers;

use Backend\Behaviors\ListController;
use Backend\Classes\Controller;
use Backend\Facades\BackendMenu;
use Flash;
use GromIT\SentMails\Models\Mail;
use Illuminate\Http\RedirectResponse;

class Mails extends Controller
{
    public $implement = [
        ListController::class,
    ];

    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Gromit.SentMails', 'sentmails', 'mails');
    }

    public function onDeleteAll(): RedirectResponse
    {
        Mail::all()->each(function (Mail $mail) {
            $mail->delete();
        });

        Flash::success(__('backend::lang.list.delete_selected_success'));

        return redirect()->refresh();
    }

    public function view(int $mailId)
    {
        $mail = Mail::query()->find($mailId);

        if ($mail === null) {
            $this->pageTitle  = __('gromit.sentmails::lang.errors.mail_not_found');
            $this->fatalError = __('gromit.sentmails::lang.errors.mail_not_found');
            return;
        }

        $this->addCss('/plugins/gromit/sentmails/controllers/mails/assets/view.css');
        $this->addJs('/plugins/gromit/sentmails/controllers/mails/assets/view.js');

        $this->pageTitle    = __('gromit.sentmails::lang.controllers.mails.view.page_title');
        $this->vars['mail'] = Mail::query()->find($mailId);
    }
}
