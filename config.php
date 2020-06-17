<?php

namespace humhub\modules\twitter;

use humhub\modules\twitter\Module;
use humhub\modules\twitter\Events;
use humhub\modules\admin\widgets\AdminMenu;
use humhub\modules\space\widgets\Sidebar as Space;
use humhub\modules\dashboard\widgets\Sidebar as Dashboard;

return [
    'id' => 'twitter',
    'class' => Module::class,
    'namespace' => 'humhub\modules\twitter',
    'events' => [
        ['class' => Dashboard::class, 'event' => Dashboard::EVENT_INIT, 'callback' => [Events::class, 'addTwitterFrame']],
        ['class' => Space::class, 'event' => Space::EVENT_INIT, 'callback' => [Events::class, 'addTwitterFrame']],
        ['class' => AdminMenu::class, 'event' => AdminMenu::EVENT_INIT, 'callback' => [Events::class, 'onAdminMenuInit']]
    ]
];
?>
