HtTemplateResolverModule
========================

[![Master Branch Build Status](https://api.travis-ci.org/hrevert/HtTemplateResolverModule.png)](http://travis-ci.org/hrevert/HtTemplateResolverModule)
[![Latest Stable Version](https://poser.pugx.org/hrevert/ht-template-resolver-module/v/stable.png)](https://packagist.org/packages/hrevert/ht-template-resolver-module)
[![Latest Unstable Version](https://poser.pugx.org/hrevert/ht-template-resolver-module/v/unstable.png)](https://packagist.org/packages/hrevert/ht-template-resolver-module)
[![Total Downloads](https://poser.pugx.org/hrevert/ht-template-resolver-module/downloads.png)](https://packagist.org/packages/hrevert/ht-template-resolver-module)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/hrevert/HtTemplateResolverModule/badges/quality-score.png?s=12c8a758ba5e2777bf51e2e0e13f53985c76453e)](https://scrutinizer-ci.com/g/hrevert/HtTemplateResolverModule/)

HtTemplateResolverModule is a Zend Framework 2 module which allows us to easily create custom template path resolvers 

##Requirements

* [Zend Framework 2](https://github.com/zendframework/zf2)
* PHP (>=5.4)

# Installation
* Add `"hrevert/ht-template-resolver-module": "0.0.*",` to your composer.json and run `php composer.phar update`
* Enable the module in `config/application.config.php`

## Basic Usage
* Create a class imlements that [Zend\View\Resolver\ResolverInterface](https://github.com/zendframework/zf2/blob/master/library/Zend/View/Resolver/ResolverInterface.php)

```php
<?php  
namespace Application\View\Resolver;

use Zend\View\Resolver\ResolverInterface;

use Zend\View\Renderer\RendererInterface as Renderer;

class MyResolver implements ResolverInterface
{
    public function resolve($name, Renderer $renderer = null)
    {
      // write your code here 
    }
}

```
* Now inform the [resolvers plugin manager](https://github.com/hrevert/HtTemplateResolverModule/blob/master/src/HtTemplateResolverModule/View/Resolver/ResolversPluginManager.php) about our new resolver.

```php
<?php
return [
    'ht_template_resolver' => [
        'resolvers_plugin_manager' => [
            'invokables' => [
                'my_resolver' => 'Application\View\Resolver\MyResolver',
            ]
        ]
    ]
];
```

* Now, tell the [AggregateResolver](https://github.com/zendframework/zf2/blob/master/library/Zend/View/Resolver/AggregateResolver.php) to use our new resolver.

```php
<?php
return [
    'ht_template_resolver' => [
        'resolvers' => [
            'my_resolver' => 200, // 200 means priority, the resolvers with highest priority are consulted first
        ]
    ]
];
```






