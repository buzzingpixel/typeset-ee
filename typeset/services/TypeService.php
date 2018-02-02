<?php

/**
 * @author TJ Draper <tj@buzzingpixel.com>
 * @copyright 2018 BuzzingPixel, LLC
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */

namespace buzzingpixel\typeset\services;

use Michelf\SmartyPants;

/**
 * Class TypeService
 */
class TypeService
{
    /**
     * Processes ampersands in a string
     * @param string $str
     * @return string
     */
    public function amp($str = '')
    {
        $ampTest = "/(\s|&nbsp;)(&|&amp;|&\#38;|&#038;)(\s|&nbsp;)/";

        return preg_replace(
            $ampTest,
            '\\1<span class="amp">&amp;</span>\\3',
            $str
        );
    }

    /**
     * Processes dashes in a string
     * @param string
     * @return string
     */
    public function dash($str = '')
    {
        $dashTest = "/(\s|&nbsp;|&thinsp;)*(&mdash;|&ndash;|&#x2013;|&#8211;|&#x2014;|&#8212;)(\s|&nbsp;|&thinsp;)*/";
        return preg_replace($dashTest, '&thinsp;\\2&thinsp;', $str);
    }

    /**
     * Processes string to keep widows from happening
     */
    public function widont($str = '')
    {
        // This regex is a beast, tread lightly
        $widontTest = "/([^\s])\s+(((<(a|span|i|b|em|strong|acronym|caps|sub|sup|abbr|big|small|code|cite|tt)[^>]*>)*\s*[^\s<>]+)(<\/(a|span|i|b|em|strong|acronym|caps|sub|sup|abbr|big|small|code|cite|tt)>)*[^\s<>]*\s*(<\/(p|h[1-6]|li)>|$))/i";

        return preg_replace($widontTest, '$1&nbsp;$2', $str);
    }

    /**
     * Runs smartypants on string
     * @param string $str
     * @return mixed
     */
    public function smartypants($str = '')
    {
        return SmartyPants::defaultTransform($str);
    }
}
