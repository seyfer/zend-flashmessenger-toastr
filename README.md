# Zend Framework 3 FlashMessenger module with integrated Toastr js library

Motivation
---

1. I had a problem with official ZF3 FlashMessenger module and decided to write own independent module.
As a basis for flash messages, I got a simple pure PHP library.
https://github.com/plasticbrain/PhpFlashMessages

2. I wanted to integrate Toastr js library for better flash messages UI. And make it easy to switch between
Toastr view and standard bootstrap view.
https://codeseven.github.io/toastr/

If you want to use standard ZF3 Flashmessanger there is another module available.
https://github.com/jenzri-nizar/zf3-flashmessenger

---

This is how it will look like with Toastr view.

![screen shot Toastr](https://raw.githubusercontent.com/seyfer/zend-flashmessenger-toastr/master/assets/screen-shot.png)

And this is Bootstrap

![screen shot Bootstrap](https://raw.githubusercontent.com/seyfer/zend-flashmessenger-toastr/master/assets/screen-shot2.png)


Installation
---

`composer require seyfer/zend-flashmessenger-toastr`

Than add module to your **config/modules.config.php**

```php
'modules' => [
    '...',
    'Seyfer\Zend\Flashmessenger'
],
```

You can switch the source of Toastr lib files by using this config in your **module.config.php**

```php
'toastr' => [
    //cdn or assets
    'source' => 'cdn',
],
```

How to use it
---

Add messages somewhere in your controller with provided plugin.

```php
<?php
$this->msg()->addSuccessMessage('test');
$this->msg()->addErrorMessage('test');
$this->msg()->addInfoMessage('test');
$this->msg()->addWarningMessage('test');
```

If you want output Toastr style messages just use provided view helper method in your 
layout.phtml. Also, you need inlineSript helper to be included.

```php
 <?php $this->msg()->renderToastr(); ?>
 <?php echo $this->inlineScript() ?>
```

For a standard Bootstrap, view uses another method.

```php
 <?php $this->msg()->renderToastr(); ?>
 <?php echo $this->inlineScript() ?>
```


That's it!

Please, don't hesitate to contribute and send pull requests.