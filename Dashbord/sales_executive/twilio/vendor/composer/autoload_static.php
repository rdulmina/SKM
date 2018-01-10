<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc9400307293a4d8d8cba67ae2080925d
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Twilio\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Twilio\\' => 
        array (
            0 => __DIR__ . '/..' . '/twilio/sdk/Twilio',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc9400307293a4d8d8cba67ae2080925d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc9400307293a4d8d8cba67ae2080925d::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
