<?php

namespace humhub\modules\twitter\models;

use Yii;
use yii\base\Model;

/**
 * ConfigureForm defines the configurable fields.
 */
class ConfigureForm extends Model
{

    public $serverUrl;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['serverUrl', 'required'],
            ['serverUrl', 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'serverUrl' => Yii::t('TwitterModule.base', 'Twitter Widget URL:'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeHints()
    {
        return [
            'serverUrl' => Yii::t('TwitterModule.base', 'e.g. https://twitter.com/{username}'),
        ];
    }

    public function loadSettings()
    {
        $this->serverUrl = Yii::$app->getModule('twitter')->settings->get('serverUrl');

        return true;
    }

    public function save()
    {
        Yii::$app->getModule('twitter')->settings->set('serverUrl', $this->serverUrl);

        return true;
    }
}
