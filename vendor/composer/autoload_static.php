<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1ceac801518f742285d44c39aa855ffe
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
            'Psr\\Http\\Message\\' => 17,
            'Psr\\Http\\Client\\' => 16,
        ),
        'A' => 
        array (
            'Aura\\Sql\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'Psr\\Http\\Client\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-client/src',
        ),
        'Aura\\Sql\\' => 
        array (
            0 => __DIR__ . '/..' . '/aura/sql/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1ceac801518f742285d44c39aa855ffe::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1ceac801518f742285d44c39aa855ffe::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}