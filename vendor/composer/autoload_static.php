<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1fd6720136ba4219590c1d5ab7fb0284
{
    public static $classMap = array (
        'Stripe_Connect_For_WooCommerce' => __DIR__ . '/../..' . '/stripe-connect-for-woocommerce.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit1fd6720136ba4219590c1d5ab7fb0284::$classMap;

        }, null, ClassLoader::class);
    }
}
