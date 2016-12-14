<?php
return [
    'id' => 'seo-breadcrumbs-test',
    'class' => 'yii\web\Application',

    'basePath' => Yii::getAlias('@tests'),
    'vendorPath' => Yii::getAlias('@vendor'),
    'runtimePath' => Yii::getAlias('@tests/_output'),

    'bootstrap' => [],
    'homeUrl' => '/',

    'components' => require(__DIR__ . '/components.php'),
    'params' => require(__DIR__ . '/params.php'),
];