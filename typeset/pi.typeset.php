<?php

/**
 * @author TJ Draper <tj@buzzingpixel.com>
 * @copyright 2018 BuzzingPixel, LLC
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */

namespace buzzingpixel\typeset;

use buzzingpixel\typeset\services\TypeService;

/**
 * Class Typeset
 */
class Typeset
{
    /** @var \EE_Template $TMPL */
    private $TMPL;

    /** @var TypeService $typeService */
    private $typeService;

    /**
     * Typeset constructor
     */
    public function __construct()
    {
        $this->TMPL = ee()->TMPL;
        $this->typeService = new TypeService();
    }

    /**
     * Tag processes ampersands on string in tag pair
     * @return string
     */
    public function amp()
    {
        return $this->typeService->amp($this->TMPL->tagdata);
    }

    /**
     * Tag processes dashes on string in tag pair
     */
    public function dash()
    {
        return $this->typeService->dash($this->TMPL->tagdata);
    }

    /**
     * Tag processes string in tag pair to keep widows from happening
     */
    public function widont()
    {
        return $this->typeService->widont($this->TMPL->tagdata);
    }

    /**
     * Tag runs smartypants on string in tag pair
     */
    public function smartypants()
    {
        return $this->typeService->smartypants($this->TMPL->tagdata);
    }

    /**
     * Tag processes all typeset functionality on string in tag pair
     */
    public function all()
    {
        $str = $this->TMPL->tagdata;
        $str = $this->typeService->amp($str);
        $str = $this->typeService->widont($str);
        $str = $this->typeService->smartypants($str);
        $str = $this->typeService->dash($str);
        return $str;
    }
}
