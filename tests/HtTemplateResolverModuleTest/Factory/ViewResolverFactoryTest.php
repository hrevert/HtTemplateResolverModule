<?php

namespace HtTemplateResolverModuleTest\Factory;

use HtTemplateResolverModule\Factory\ViewResolverFactory;
use Zend\ServiceManager\ServiceManager;
use Zend\View\Resolver;

class ViewResolverFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testFactory()
    {
        $factory = new ViewResolverFactory;
        $serviceManager = new ServiceManager;        
        $serviceManager->setService(
            'Config', 
            [
                'ht_template_resolver' => [
                    'resolvers' => [
                        'map' => 1000,
                        'path_stack' => 500
                    ]
                ]
            ]
        );
        $resolversManager = new \HtTemplateResolverModule\View\Resolver\ResolversPluginManager;
        $resolversManager->setInvokableClass('map', new Resolver\TemplateMapResolver);
        $resolversManager->setInvokableClass('path_stack', new Resolver\TemplatePathStack);
        $serviceManager->setService('HtTemplateResolverModule\View\Resolver\ResolversPluginManager', $resolversManager);
        $this->assertInstanceOf('Zend\View\Resolver\AggregateResolver', $factory->createService($serviceManager));        
    }
}
