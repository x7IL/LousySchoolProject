<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0b48db0c06ddac8c49f90a7c0081fdc3
{
    public static $files = array (
        'c9d07b32a2e02bc0fc582d4f0c1b56cc' => __DIR__ . '/..' . '/laminas/laminas-servicemanager/src/autoload.php',
    );

    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'Vendor\\MonsiteLan\\' => 18,
        ),
        'R' => 
        array (
            'ReCaptcha\\' => 10,
        ),
        'P' => 
        array (
            'Psr\\Container\\' => 14,
        ),
        'L' => 
        array (
            'Laminas\\Stdlib\\' => 15,
            'Laminas\\Session\\' => 16,
            'Laminas\\ServiceManager\\' => 23,
            'Laminas\\EventManager\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Vendor\\MonsiteLan\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'ReCaptcha\\' => 
        array (
            0 => __DIR__ . '/..' . '/google/recaptcha/src/ReCaptcha',
        ),
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'Laminas\\Stdlib\\' => 
        array (
            0 => __DIR__ . '/..' . '/laminas/laminas-stdlib/src',
        ),
        'Laminas\\Session\\' => 
        array (
            0 => __DIR__ . '/..' . '/laminas/laminas-session/src',
        ),
        'Laminas\\ServiceManager\\' => 
        array (
            0 => __DIR__ . '/..' . '/laminas/laminas-servicemanager/src',
        ),
        'Laminas\\EventManager\\' => 
        array (
            0 => __DIR__ . '/..' . '/laminas/laminas-eventmanager/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0b48db0c06ddac8c49f90a7c0081fdc3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0b48db0c06ddac8c49f90a7c0081fdc3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0b48db0c06ddac8c49f90a7c0081fdc3::$classMap;

        }, null, ClassLoader::class);
    }
}
