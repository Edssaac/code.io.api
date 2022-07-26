<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc4d08e59e281defb7baba13b992ea2c4
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc4d08e59e281defb7baba13b992ea2c4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc4d08e59e281defb7baba13b992ea2c4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc4d08e59e281defb7baba13b992ea2c4::$classMap;

        }, null, ClassLoader::class);
    }
}
