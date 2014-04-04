<?php
namespace HtTemplateResolverModuleTest\View\Resolver;

use HtTemplateResolverModule\View\Resolver\ResolversPluginManager;

class ResolversPluginManagerTest extends \PHPUnit_Framework_TestCase
{
    public function testValidatePlugin()
    {
        $resolversPluginManager = new ResolversPluginManager;
        // if no exception is thrown, we are okay
        $resolversPluginManager->validatePlugin(new \Zend\View\Resolver\TemplatePathStack);
        $this->setExpectedException('HtTemplateResolverModule\Exception\RuntimeException'); 
        $resolversPluginManager->validatePlugin(new \ArrayObject); 
    }
}
