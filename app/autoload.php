<?php

use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();
$loader->registerNamespaces(array(
    'Symfony'                   => array(__DIR__.'/../vendor/symfony/src', __DIR__.'/../vendor/bundles'),
    'Sensio'                    => __DIR__.'/../vendor/bundles',
    'JMS'                       => __DIR__.'/../vendor/bundles',
    'Doctrine\\Common'          => __DIR__.'/../vendor/doctrine-common/lib',
    'Doctrine\\MongoDB'         => __DIR__.'/../vendor/doctrine-mongodb/lib',
    'Doctrine\\ODM\\MongoDB'    => __DIR__.'/../vendor/doctrine-mongodb-odm/lib',
    'Doctrine\\DBAL'            => __DIR__.'/../vendor/doctrine-dbal/lib',
    'Doctrine'                  => __DIR__.'/../vendor/doctrine/lib',
    'Zend'                      => __DIR__.'/../vendor/zend/src',
    'Monolog'                   => __DIR__.'/../vendor/monolog/src',
    'Assetic'                   => __DIR__.'/../vendor/assetic/src',
    'Knplabs'                   => array(__DIR__.'/../vendor/knplabs/src', __DIR__.'/../vendor/bundles'),
    'Knplabs\\Snappy'           => __DIR__.'/../vendor/knplabs/snappy/src',
    'FOS'                       => __DIR__.'/../vendor/fos/src',
    'Acme'                      => __DIR__.'/../src',
    'RJC'                       => __DIR__.'/../src',
));
$loader->registerPrefixes(array(
    'Twig_Extensions_' => __DIR__.'/../vendor/twig-extensions/lib',
    'Twig_'            => __DIR__.'/../vendor/twig/lib',
    'Swift_'           => __DIR__.'/../vendor/swiftmailer/lib/classes',
));
$loader->register();
$loader->registerPrefixFallback(array(
    __DIR__.'/../vendor/symfony/src/Symfony/Component/Locale/Resources/stubs',
));
