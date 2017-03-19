<?php

namespace Seyfer\Zend\Flashmessabger;

use Seyfer\Zend\Flashmessabger\Controller\FlashMessengerController;
use Seyfer\Zend\Flashmessabger\Controller\Plugin\FlashMessagesPlugin;
use Seyfer\Zend\Flashmessabger\View\Helper\FlashMessagesHelper;
use Seyfer\Zend\Flashmessabger\View\Helper\FlashMessagesHelperFactory;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'toastr'             => [
        //cdn or assets
        'source' => 'cdn',
    ],
    'router'             => [
        'routes' => [
            'FlashMessenger' => [
                'type'    => Segment::class,
                'options' => [
                    'route'       => '/flashmessenger[/:action]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ],
                    'defaults'    => [
                        'controller' => FlashMessengerController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers'        => [
        'factories' => [
            FlashmessengerController::class => InvokableFactory::class,
        ],
    ],
    'view_manager'       => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'controller_plugins' => [
        'factories' => [
            FlashMessagesPlugin::class => InvokableFactory::class,
        ],
        'aliases'   => [
            'msg' => FlashMessagesPlugin::class,
        ]
    ],
    'view_helpers'       => [
        'factories' => [
            FlashMessagesHelper::class => FlashMessagesHelperFactory::class,
        ],
        'aliases'   => [
            'msg' => FlashMessagesHelper::class
        ]
    ],
];