<?php

namespace Seyfer\Zend\Flashmessabger\View\Helper;


use Plasticbrain\FlashMessages\FlashMessages;
use Zend\View\Helper\AbstractHelper;
use Zend\View\Helper\InlineScript;

/**
 * Class FlashMessagesHelper
 * @package Seyfer\Zend\Flashmessabger\View\Helper
 */
class FlashMessagesHelper extends AbstractHelper
{
    /**
     * @var InlineScript
     */
    private $inlineScript;

    /**
     * FlashMessagesHelper constructor.
     * @param InlineScript $inlineScript
     */
    public function __construct(InlineScript $inlineScript)
    {
        $this->inlineScript = $inlineScript;
    }

    /**
     * @return bool
     */
    public function renderToastr()
    {
        if (!isset($_SESSION['flash_messages'])) {
            return false;
        }

        $this->inlineScript->captureStart();

        foreach ($_SESSION['flash_messages'] as $type => $msgTypeData) {
            foreach ($msgTypeData as $key => $oneMessage) {
                $message = $oneMessage['message'];

                $message = preg_replace('/\s+/', ' ', $message);

                switch ($type) {
                    case FlashMessages::INFO;
                        echo 'toastr.info("' . $message . '");';
                        break;
                    case FlashMessages::SUCCESS;
                        echo 'toastr.success("' . $message . '");';
                        break;
                    case FlashMessages::WARNING;
                        echo 'toastr.warning("' . $message . '");';
                        break;
                    case FlashMessages::ERROR;
                        echo 'toastr.error("' . $message . '");';
                        break;
                }
            }
        }

        $this->inlineScript->captureEnd();

        unset($_SESSION['flash_messages']);

        return true;
    }

    /**
     * @return string
     */
    public function renderBootstrap()
    {
        $msg = new FlashMessages();

        return $msg->display();
    }
}