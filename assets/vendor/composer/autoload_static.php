<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitda769b53fd558244ec840c904556be67
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitda769b53fd558244ec840c904556be67::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitda769b53fd558244ec840c904556be67::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
