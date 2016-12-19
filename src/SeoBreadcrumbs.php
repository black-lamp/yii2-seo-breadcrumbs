<?php
/**
 * @link https://github.com/black-lamp/yii2-seo-breadcrumbs
 * @copyright Copyright (c) Vladimir Kuprienko
 * @license BSD 3-Clause License
 */

namespace bl\seo;

use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/**
 * Widget provides SEO schema for Breadcrumbs widget
 *
 * @property array $options
 * @property $seoOptions
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class SeoBreadcrumbs extends Breadcrumbs
{
    /**
     * @var array the HTML seo attributes for the breadcrumb container tag
     */
    public $seoOptions = [
        'itemscope' => true,
        'itemtype' => 'http://schema.org/BreadcrumbList'
    ];
    /**
     * @inheritdoc
     */
    public $itemTemplate = "<li itemprop=\"itemListElement\" itemscope itemtype=\"http://schema.org/ListItem\">\n"
                                . "{link}\n"
                                . "<meta itemprop=\"position\" content=\"{position}\">\n"
                            . "</li>\n";
    /**
     * @inheritdoc
     */
    public $activeItemTemplate = "<li class=\"active\" itemprop=\"itemListElement\" itemscope itemtype=\"http://schema.org/ListItem\">\n"
                                    . "{link}\n"
                                    . "<meta itemprop=\"position\" content=\"{position}\">\n"
                                . "</li>\n";

    /**
     * @var integer
     */
    protected $_position = 1;


    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->options = array_merge($this->options, $this->seoOptions);
    }

    /**
     * @inheritdoc
     */
    protected function renderItem($link, $template)
    {
        $encodeLabel = ArrayHelper::remove($link, 'encode', $this->encodeLabels);

        if (array_key_exists('label', $link)) {
            $label = $encodeLabel ? Html::encode($link['label']) : $link['label'];
        }
        else {
            throw new InvalidConfigException('The "label" element is required for each link.');
        }

        if (isset($link['template'])) {
            $template = $link['template'];
        }

        $labelSeoOptions = ['itemprop' => 'name'];
        $label = Html::tag('span', $label, $labelSeoOptions);

        if (isset($link['url'])) {
            $options = $link;
            unset($options['template'], $options['label'], $options['url']);

            $linkSeoOptions = [
                'itemscope' => true,
                'itemtype' => 'http://schema.org/Thing',
                'itemprop' => 'item'
            ];
            $options = array_merge($options, $linkSeoOptions);

            $link = Html::a($label, $link['url'], $options);
        }
        else {
            $link = $label;
        }

        return strtr($template, [
            '{link}' => $link,
            '{position}' => $this->_position++
        ]);
    }
}
