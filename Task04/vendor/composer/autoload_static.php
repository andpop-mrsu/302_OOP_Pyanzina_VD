<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitad23efe9a31c86c35e7bb31aa783826d
{
    public static $files = array (
        '8d26b7777597032998f0659fb45a8a7e' => __DIR__ . '/../..' . '/src/Test.php',
        '3b00b0549a49282bafdd57b561a0be94' => __DIR__ . '/../..' . '/src/StringUtils.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitad23efe9a31c86c35e7bb31aa783826d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitad23efe9a31c86c35e7bb31aa783826d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitad23efe9a31c86c35e7bb31aa783826d::$classMap;

        }, null, ClassLoader::class);
    }
}
