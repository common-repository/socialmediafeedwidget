<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb8021e45314bd95459c310b94a7a260b
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
    );

    public static $classMap = array (
        'TDP\\WP_Notice' => __DIR__ . '/..' . '/alessandrotesoro/wp-notices/wp-notices.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb8021e45314bd95459c310b94a7a260b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb8021e45314bd95459c310b94a7a260b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb8021e45314bd95459c310b94a7a260b::$classMap;

        }, null, ClassLoader::class);
    }
}
