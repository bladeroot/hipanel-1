<?php

namespace ahnames\hipanel\menus;

use hiqdev\yii2\menus\Menu;
use Yii;

class SidebarMenu extends Menu
{
    public function items()
    {
        $app = Yii::$app;
        $language = $app->language ?? 'en';
        /** @var Module $module */
        $module = $app->getModule('server');
        $outsideUrlExists = (bool)Yii::$app->params['module.server.order.redirect.url'];
        /** @var User $user */
        $user = $app->user;
        $isVisible = true;
        $targetBlank = [
            'target'    => '_blank',
            'rel'       => 'noopener noreferrer',
        ];

        return [
            'servers' => [
                'label'     => Yii::t('hipanel:server', 'Servers'),
                'url'       => ['/server/server/index'],
                'icon'      => 'fa-server',
                'visible'   => $user->can('server.read'),
                'items' => [
                    'servers' => [
                        'label' => Yii::t('hipanel:server', 'Servers'),
                        'url'   => ['/server/server/index'],
                    ],
                    'switch' => [
                        'label'   => Yii::t('hipanel:server', 'Switches'),
                        'url'     => ['/server/hub/index'],
                        'visible' => $user->can('hub.read'),
                    ],
                    'refuse' => [
                        'label'   => Yii::t('hipanel:server', 'Refuses'),
                        'url'     => ['/server/refuse/index'],
                        'visible' => $user->can('resell') && $module->orderIsAllowed && $outsideUrlExists,
                    ],
                    'cloud_servers' => [
                        'label' => Yii::t('hipanel', 'Cloud Servers'),
                        'url' => "https://advancedhosting.com/{$language}/cloud-servers?refid=ahmenen",
                        'icon' => 'fa-cloud',
                        'visible' => $isVisible,
                        'linkOptions' => $targetBlank,
                        'isNew' => true,
                    ],
                    'cloud_storage' => [
                        'label' => Yii::t('hipanel', 'Cloud Storage'),
                        'url' => "https://advancedhosting.com/{$language}/cloud-storage/?refid=ahmenen",
                        'icon' => 'fa-cloud-upload',
                        'visible' => $isVisible,
                        'linkOptions' => $targetBlank,
                        'isNew' => true,
                    ],
                    'video_cdn' => [
                        'label' => Yii::t('hipanel', 'VideoCDN'),
                        'url' => "https://advancedhosting.com/{$language}/video-cdn/?refid=ahmenen",
                        'icon' => 'fa-video-camera',
                        'visible' => $isVisible,
                        'linkOptions' => $targetBlank,
                        'isNew' => true,
                    ],
                    'anycast_cdn' => [
                        'label' => Yii::t('hipanel', 'Anycast CDN'),
                        'url' => "https://advancedhosting.com/{$language}/static-cdn/?refid=ahmenen",
                        'icon' => 'fa-globe',
                        'visible' => $isVisible,
                        'linkOptions' => $targetBlank,
                        'isNew' => true,
                    ],
                    'anycast_dns' => [
                        'label' => Yii::t('hipanel', 'Anycast DNS'),
                        'url' => "https://advancedhosting.com/{$language}/anycast-dns/?refid=ahmenen",
                        'icon' => 'fa-globe',
                        'visible' => $isVisible,
                        'linkOptions' => $targetBlank,
                        'isNew' => true,
                    ],
                ],
            ],
        ];
    }
}
