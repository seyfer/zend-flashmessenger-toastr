<?php

namespace Seyfer\Zend\Flashmessabger\Controller\Plugin;


use Plasticbrain\FlashMessages\FlashMessages;
use Zend\Mvc\Controller\Plugin\AbstractPlugin;

/**
 * Class FlashMessagesPlugin
 * @package Seyfer\Zend\Flashmessabger\Controller\Plugin
 */
class FlashMessagesPlugin extends AbstractPlugin
{
    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    function __call($name, $arguments)
    {
        $msg = new FlashMessages();

        return $msg->$name(...$arguments);
    }

}