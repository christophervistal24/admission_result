<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit61f822a742abdc540a4d326cb1c13013
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
            0 => __DIR__ . '/../..' . '/App/Controller',
            1 => __DIR__ . '/../..' . '/App/Core',
            2 => __DIR__ . '/../..' . '/App/Model',
        ),
    );

    public static $classMap = array (
        'App\\Controller\\Page' => __DIR__ . '/../..' . '/App/Controller/page.php',
        'App\\Core\\App' => __DIR__ . '/../..' . '/App/Core/App.php',
        'App\\Core\\Controller' => __DIR__ . '/../..' . '/App/Core/Controller.php',
        'App\\Model\\Database' => __DIR__ . '/../..' . '/App/Model/Database.php',
        'App\\Model\\User' => __DIR__ . '/../..' . '/App/Model/User.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit61f822a742abdc540a4d326cb1c13013::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit61f822a742abdc540a4d326cb1c13013::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit61f822a742abdc540a4d326cb1c13013::$classMap;

        }, null, ClassLoader::class);
    }
}
