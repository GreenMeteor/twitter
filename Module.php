<?php

namespace humhub\modules\twitter;

use Yii;
use yii\helpers\Url;
use humhub\components\Module as BaseModule;

class Module extends BaseModule
{
    /**
     * @inheritdoc
     */
    public function getConfigUrl()
    {
        return Url::to(['/twitter/admin']);
    }

    public function getServerUrl()
    {
        $url = $this->settings->get('serverUrl');
        if (empty($url)) {
            return 'https://twitter.com';
        }
        return $url;
    }
}
