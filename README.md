SEO breadcrumbs widget for Yii2
===============================
Widget with SEO attributes for breadcrumbs

Installation
------------
#### Run command
```
composer require black-lamp/yii2-seo-breadcrumbs
```
or add
```json
"black-lamp/yii2-seo-breadcrumbs": "1.*.*"
```
to the require section of your composer.json.

Using
-----
> layout.php
```php
<?= \bl\seo\SeoBreadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]) ?>
```


> view_file.php
```php
<?php
$this->params['breadcrumbs'][] = 'Contacts';
?>
```

or

```php
<?= \bl\seo\SeoBreadcrumbs::widget([
    'homeLink' => [
        'label' => 'Home',
        'url' => \yii\helpers\Url::toRoute(['/']),
    ],
    'links' => 'Contacts',
]) ?>
```