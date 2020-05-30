<?php

use yii\helpers\Url;
use humhub\libs\Html;
use humhub\models\Setting;
use humhub\widgets\PanelMenu;
use humhub\modules\twitter\Assets;
use humhub\modules\ui\view\components\View;

/* @var $twitterUrl string */
/* @var $this View */

Assets::register($this);
?>

<div class="panel panel-default panel-twitter" id="panel-twitter">
    <?= PanelMenu::widget(['id' => 'panel-twitter']); ?>
  <div class="panel-heading">
    <?= Yii::t('TwitterModule.base', '<i class="fa fa-twitter"></i> <strong>Twitter</strong>'); ?>
  </div>
  <div class="panel-body">

<?= Html::beginTag('div') ?>
<a class="twitter-timeline" href="<?= $twitterUrl; ?>" width="100%" height="500"></a>
        <?= Html::beginTag('script', ['id' => 'twttr-widgets-js', 'src' => 'https://platform.twitter.com/widgets.js']) ?><?= Html::endTag('script') ?>
        <script <?= Html::nonce() ?>>
            $(document).off('humhub:ready.gm_twitter').on('humhub:ready.gm_twitter', function(event ,pjax) {
                if (pjax && window.__twttr.widgets.init && $('#twttr-widgets-js').length) {
                   __twttr.widgets.init();
                }
            });
        </script>
<?= Html::endTag('div'); ?>

</div>
</div>
