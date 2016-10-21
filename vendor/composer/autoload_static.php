<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit398069bfc5436555662cf22c3455884b
{
    public static $files = array (
        'c7359326b6707d98bdc176bf9ddeaebf' => __DIR__ . '/..' . '/catfan/medoo/medoo.php',
    );

    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Whoops\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Whoops\\' => 
        array (
            0 => __DIR__ . '/..' . '/filp/whoops/src/Whoops',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit398069bfc5436555662cf22c3455884b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit398069bfc5436555662cf22c3455884b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
