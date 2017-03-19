<?php

/**
 * Created by PhpStorm.
 * User: seyfer
 * Date: 3/19/17
 */

namespace Seyfer\Zend\Flashmessenger;


use Zend\ModuleManager\Feature\ConfigProviderInterface;

/**
 * Class Module
 * @package Seyfer\Zend\Flashmessenger
 */
class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}