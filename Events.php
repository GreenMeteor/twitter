<?php

namespace humhub\modules\twitter;

use Yii;
use yii\helpers\Url;
use yii\base\BaseObject;
use humhub\models\Setting;

class Events extends BaseObject
{
    public static function onAdminMenuInit($event)
    {
        $event->sender->addItem([
            'label' => Yii::t('TwitterModule.base', 'Twitter Settings'),
            'url' => Url::toRoute('/twitter/admin/index'),
            'group' => 'settings',
            'icon' => '<i class="fa fa-twitter"></i>',
            'isActive' => Yii::$app->controller->module && Yii::$app->controller->module->id == 'twitter' && Yii::$app->controller->id == 'admin',
            'sortOrder' => 650
        ]);
    }

    public static function addTwitterFrame($event)
    {
        if (Yii::$app->user->isGuest) {
            return;
        }

        $event->sender->view->registerAssetBundle(Assets::class);
        $event->sender->addWidget(widgets\TwitterFrame::class, [], [
            'sortOrder' => Setting::Get('timeout', 'twitter')
        ]);
    }
}
