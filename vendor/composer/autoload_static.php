<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit341804cb194e29c2e9ce3cf5933dd5a7
{
    public static $classMap = array (
        'Firebase\\Error' => __DIR__ . '/..' . '/ktamas77/firebase-php/src/firebaseStub.php',
        'Firebase\\FirebaseInterface' => __DIR__ . '/..' . '/ktamas77/firebase-php/src/firebaseInterface.php',
        'Firebase\\FirebaseLib' => __DIR__ . '/..' . '/ktamas77/firebase-php/src/firebaseLib.php',
        'Firebase\\FirebaseStub' => __DIR__ . '/..' . '/ktamas77/firebase-php/src/firebaseStub.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit341804cb194e29c2e9ce3cf5933dd5a7::$classMap;

        }, null, ClassLoader::class);
    }
}
