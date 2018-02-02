<?php

/**
 * @author TJ Draper <tj@buzzingpixel.com>
 * @copyright 2018 BuzzingPixel, LLC
 * @license http://www.apache.org/licenses/LICENSE-2.0
 */

// Get addon json path
$addOnPath = realpath(__DIR__);

// Get vendor autoload
$vendorAutoloadFile = "{$addOnPath}/vendor/autoload.php";

// Require the autoload file if path exists
if (file_exists($vendorAutoloadFile)) {
    require $vendorAutoloadFile;
}

return [
    'author' => 'TJ Draper',
    'author_url' => 'https://buzzingpixel.com',
    'description' => 'Typography functions for ExpressionEngine',
    'name' => 'Typeset',
    'namespace' => 'buzzingpixel\typeset',
    'settings_exist' => false,
    'version' => '1.0.0',
];
