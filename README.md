SEO breadcrumbs widget for Yii2
===============================
Widget provides [SEO schema](http://schema.org/BreadcrumbList) for Breadcrumbs widget in Yii2 Framework

[![Build Status](https://travis-ci.org/black-lamp/yii2-seo-breadcrumbs.svg?branch=master)](https://travis-ci.org/black-lamp/yii2-seo-breadcrumbs)
[![Latest Stable Version](https://poser.pugx.org/black-lamp/yii2-seo-breadcrumbs/version)](https://packagist.org/packages/black-lamp/yii2-seo-breadcrumbs)
[![Latest Unstable Version](https://poser.pugx.org/black-lamp/yii2-seo-breadcrumbs/v/unstable)](//packagist.org/packages/black-lamp/yii2-seo-breadcrumbs)
[![License](https://poser.pugx.org/black-lamp/yii2-seo-breadcrumbs/license)](https://packagist.org/packages/black-lamp/yii2-seo-breadcrumbs)

Installation
------------
Run command
```
composer require black-lamp/yii2-seo-breadcrumbs
```
or add
```json
"black-lamp/yii2-seo-breadcrumbs": "^1.1.0"
```
to the require section of your composer.json.

Using
-----

Call widget in view layout
```php
<?= \bl\seo\SeoBreadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]) ?>
```
in view file just add a item or items to params array
```php
$this->params['breadcrumbs'][] = 'Contacts';
```
or call the widget with configuration array in view file
```php
<?= \bl\seo\SeoBreadcrumbs::widget([
    'homeLink' => [
        'label' => 'Home',
        'url' => \yii\helpers\Url::toRoute(['/']),
    ],
    'links' => 'Contacts',
]) ?>
```