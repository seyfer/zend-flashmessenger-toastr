<?php

namespace Seyfer\Zend\Flashmessabger\View\Helper;


use Plasticbrain\FlashMessages\FlashMessages;
use Zend\View\Helper\AbstractHelper;
use Zend\View\Helper\InlineScript;
use Zend\View\Helper\Url;

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
     * @var array
     */
    private $config;

    /**
     * @var Url
     */
    private $url;

    /**
     * FlashMessagesHelper constructor.
     * @param InlineScript $inlineScript
     * @param Url $url
     * @param array $config
     */
    public function __construct(InlineScript $inlineScript, Url $url, array $config)
    {
        $this->inlineScript = $inlineScript;
        $this->config       = $config;
        $this->url          = $url;
    }

    /**
     * @return bool
     */
    public function renderToastr()
    {
        if (!isset($_SESSION['flash_messages'])) {
            return false;
        }

        $source = isset($this->config['toastr']['source']) ? $this->config['toastr']['source'] : 'cdn';

        if (!in_array($source, ['cdn', 'assets'])) {
            throw new \RuntimeException('Please select source for Toastr lib in [\'toastr\'][\'source\'] config');
        }

        if ($source == 'cdn') {
            $this->inlineScript->appendFile('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js');
            echo '<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" media="screen" rel="stylesheet" type="text/css">';
        } else {
            $url = $this->url;

            $this->inlineScript->appendFile($url('FlashMessenger', ["action" => "js"]));
            echo '<link href="' . $url('FlashMessenger', ["action" => "css"]) . '" media="screen" rel="stylesheet" type="text/css">';
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