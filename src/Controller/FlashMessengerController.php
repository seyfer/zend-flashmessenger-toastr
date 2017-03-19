<?php

namespace Seyfer\Zend\Flashmessenger\Controller;


use Zend\Mvc\Controller\AbstractActionController;

/**
 * Class FlashMessengerController
 * @package Seyfer\Zend\Flashmessenger\Controller
 */
class FlashMessengerController extends AbstractActionController
{
    /**
     * this is for getting js asset
     */
    public function jsAction()
    {
        header('Content-type:application/javascript;charset=utf-8');
        $js = file_get_contents(__dir__ . "/../../assets/toastr.min.js");

        echo $js;
        exit;
    }

    /**
     * this is for getting css asset
     */
    public function cssAction()
    {
        header('Content-type:text/css;charset=utf-8');
        $css = file_get_contents(__dir__ . "/../../assets/toastr.min.css");

        echo $css;
        exit;
    }
}