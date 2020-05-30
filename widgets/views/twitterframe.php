<?php

use yii\helpers\Url;
use humhub\libs\Html;
use humhub\models\Setting;

\humhub\modules\twitter\Assets::register($this);
?>

<div class="panel panel-default panel-twitter" id="panel-twitter">
    <?= \humhub\widgets\PanelMenu::widget(['id' => 'panel-twitter']); ?>
  <div class="panel-heading">
    <?=Yii::t('TwitterModule.base', '<strong>Twitter</strong>'); ?>
  </div>
  <div class="panel-body">

<?= Html::beginTag('div') ?>
<a class="twitter-timeline" href="<?= $twitterUrl; ?>" width="100%" height="500"></a>
        <?= Html::beginTag('script', ['id' => 'twttr-js', 'src' => 'https://platform.twitter.com/widgets.js']) ?><?= Html::endTag('script') ?>
        <script <?= Html::nonce() ?>>
            $(document).off('humhub:ready.gm_twitter').on('humhub:ready.gm_twitter', function(event ,pjax) {
                if (pjax && window.__twttr && $('#twttr-js').length) {
                   __twttr();
                }
            });
        </script>
<?= Html::endTag('div'); ?>

</div>
</div>
