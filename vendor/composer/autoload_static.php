<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0477ef7da25333c3eec0742dd3d4209c
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

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0477ef7da25333c3eec0742dd3d4209c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0477ef7da25333c3eec0742dd3d4209c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0477ef7da25333c3eec0742dd3d4209c::$classMap;

        }, null, ClassLoader::class);
    }
}
