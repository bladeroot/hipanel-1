<?php
/**
 * AHnames implementation of HiPanel
 *
 * @link      https://ahnames.com/
 * @package   hipanel
 * @license   proprietary
 * @copyright Copyright (c) 2015-2017, AHnames (https://ahnames.com/)
 */

return [
    'modules' => [
        'language' => [
            'languages' => [
                'en' => 'English',
                'ru' => 'Русский',
            ],
        ],
    ],
    'container' => [
        'definitions' => [
            \hipanel\modules\dashboard\menus\DashboardMenu::class => [
                'add' => [
                    'server' => [
                        'menu' => [
                            'class' => \hipanel\modules\server\menus\DashboardItem::class,
                        ],
                        'where' => [
                            'after' => ['certificates', 'domains', 'finance', 'clients', 'dashboard'],
                            'before' => ['hosting'],
                        ],
                    ],
                ],
            ],
            \hiqdev\thememanager\menus\AbstractSidebarMenu::class => [
                'add' => [
                    'server' => [
                        'menu' => [
                            'class' => \ahnames\hipanel\menus\SidebarMenu::class,
                        ],
                        'where' => [
                            'after' => ['certificates', 'domains', 'stock', 'finance', 'clients', 'dashboard'],
                            'before' => ['tickets'],
                        ],
                    ],
                ],
            ],
        ],
    ],
];
