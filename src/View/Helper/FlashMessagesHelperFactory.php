<?php

namespace Seyfer\Zend\Flashmessabger\View\Helper;


use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class FlashMessagesHelperFactory
 * @package Seyfer\Zend\Flashmessabger\View\Helper
 */
class FlashMessagesHelperFactory implements FactoryInterface
{

    /**
     * @inheritdoc
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $vhm = $container->get('ViewHelperManager');

        $is = $vhm->get('inlinescript');

        return new FlashMessagesHelper($is);
    }
}