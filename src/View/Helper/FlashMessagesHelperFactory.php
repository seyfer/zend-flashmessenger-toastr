<?php

namespace Seyfer\Zend\Flashmessenger\View\Helper;


use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class FlashMessagesHelperFactory
 * @package Seyfer\Zend\Flashmessenger\View\Helper
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
        $url = $vhm->get('url');

        $config = $container->get('Config');

        return new FlashMessagesHelper($is, $url, $config);
    }
}
