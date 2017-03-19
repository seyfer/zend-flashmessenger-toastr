<?php

/**
 * Created by PhpStorm.
 * User: seyfer
 * Date: 3/19/17
 */

namespace Seyfer\Zend\Flashmessabger;


use Zend\ModuleManager\Feature\ConfigProviderInterface;

/**
 * Class Module
 * @package Seyfer\Zend\Flashmessabger
 */
class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}