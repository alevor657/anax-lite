<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7ca65d3d1fce2562549caebc57f70ff5
{
    public static $files = array (
        '6b9cbd293adb7d895e163aebb2790539' => __DIR__ . '/..' . '/anax/common/src/functions.php',
        '2cffec82183ee1cea088009cef9a6fc3' => __DIR__ . '/..' . '/ezyang/htmlpurifier/library/HTMLPurifier.composer.php',
        '31a1267a66c408f5203984cea391e967' => __DIR__ . '/../..' . '/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Mos\\TextFilter\\' => 15,
        ),
        'A' => 
        array (
            'Anax\\' => 5,
            'Alvo16\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Mos\\TextFilter\\' => 
        array (
            0 => __DIR__ . '/..' . '/mos/ctextfilter/src/TextFilter',
        ),
        'Anax\\' => 
        array (
            0 => __DIR__ . '/..' . '/anax/common/src',
            1 => __DIR__ . '/..' . '/anax/url/src',
            2 => __DIR__ . '/..' . '/anax/view/src',
            3 => __DIR__ . '/..' . '/anax/request/src',
            4 => __DIR__ . '/..' . '/anax/database/src',
            5 => __DIR__ . '/..' . '/anax/response/src',
            6 => __DIR__ . '/..' . '/anax/router/src',
        ),
        'Alvo16\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'M' => 
        array (
            'Michelf' => 
            array (
                0 => __DIR__ . '/..' . '/michelf/php-smartypants',
                1 => __DIR__ . '/..' . '/michelf/php-markdown',
            ),
        ),
        'H' => 
        array (
            'Highlight\\' => 
            array (
                0 => __DIR__ . '/..' . '/scrivo/highlight.php',
            ),
            'HTMLPurifier' => 
            array (
                0 => __DIR__ . '/..' . '/ezyang/htmlpurifier/library',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7ca65d3d1fce2562549caebc57f70ff5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7ca65d3d1fce2562549caebc57f70ff5::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit7ca65d3d1fce2562549caebc57f70ff5::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
