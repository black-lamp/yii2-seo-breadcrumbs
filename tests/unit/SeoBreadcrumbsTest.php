<?php
/**
 * @license GNU Public License
 * @copyright Copyright (c) Vladimir Kuprienko
 * @link https://github.com/black-lamp/yii2-seo-breadcrumbs
 */

namespace tests\unit;

use bl\seo\SeoBreadcrumbs;

/**
 * Test case for widget
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 */
class SeoBreadcrumbsTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    public function testSeoSchema()
    {
        /**
         * @var \bl\seo\SeoBreadcrumbs $object
         */
        $object = new SeoBreadcrumbs();
        $object->links = ['Test'];

        $expectedHTML = "<ul class=\"breadcrumb\" itemscope itemtype=\"http://schema.org/BreadcrumbList\">"
                            . "<li itemprop=\"itemListElement\" itemscope itemtype=\"http://schema.org/ListItem\">\n"
                                    . "<a href=\"/\" itemscope itemtype=\"http://schema.org/Thing\" itemprop=\"item\">"
                                            . "<span itemprop=\"name\">Home</span>"
                                        . "</a>\n"
                                    . "<meta itemprop=\"position\" content=\"1\">\n"
                            . "</li>\n"
                                . "<li class=\"active\" itemprop=\"itemListElement\" itemscope itemtype=\"http://schema.org/ListItem\">\n"
                                    . "<span itemprop=\"name\">Test</span>\n"
                                    . "<meta itemprop=\"position\" content=\"2\">\n"
                                . "</li>\n"
                        . "</ul>";

        ob_start();
        $object->run();
        $actualHTML = ob_get_contents();
        ob_end_clean();

        $this->assertEquals($expectedHTML, $actualHTML, 'HTML should be equal');
    }
}