<?php

return [
    'menu_label'  => 'Отправленные письма',
    'mails'       => [
        'subject'   => 'Тема',
        'from'      => 'От кого',
        'to'        => 'Кому',
        'cc'        => 'Копия',
        'bcc'       => 'Скрытая копия',
        'sent_at'   => 'Когда',
        'opened_at' => 'Открыто',
    ],
    'settings'    => [
        'disk' => [
            'label'   => 'Диск для хранения отправленных писем',
            'comment' => '<span class="text-danger">Изменяйте, только если точно знаете, что делаете!</span>',
        ]
    ],
    'errors'      => [
        'mail_not_found' => 'Письмо не найдено',
        'file_deleted'   => 'Файл удален',
    ],
    'controllers' => [
        'mails' => [
            'index' => [
                'page_title'      => 'Просмотр отправленных писем',
                'delete_selected' => [
                    'label'   => 'Удалить выбранные',
                    'confirm' => 'Вы действительно хотите удалить выбранные письма?',
                ]
            ],
            'view'  => [
                'page_title'     => 'Просмотр письма',
                'back'           => 'Назад',
                'return_to_list' => 'Вернуться к списку писем',
            ],
        ],
    ],
    'plugin'      => [
        'description' => 'Сохраняет отправляемые письма в storage',
        'settings' => [
            'sentmails' => [
                'description' => 'Настройки плагина SentMails',
            ],
        ],
    ],
];
