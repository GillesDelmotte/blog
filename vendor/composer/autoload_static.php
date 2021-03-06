<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit039db1128527ed5459e914b75b0f42cd
{
    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'Blog\\Models\\' => 12,
            'Blog\\Controllers\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Blog\\Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/models',
        ),
        'Blog\\Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controllers',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit039db1128527ed5459e914b75b0f42cd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit039db1128527ed5459e914b75b0f42cd::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
