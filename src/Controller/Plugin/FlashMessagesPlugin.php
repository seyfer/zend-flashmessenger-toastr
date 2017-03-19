<?php

namespace Seyfer\Zend\Flashmessenger\Controller\Plugin;


use Plasticbrain\FlashMessages\FlashMessages;
use Zend\Mvc\Controller\Plugin\AbstractPlugin;

/**
 * Class FlashMessagesPlugin
 * @package Seyfer\Zend\Flashmessenger\Controller\Plugin
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