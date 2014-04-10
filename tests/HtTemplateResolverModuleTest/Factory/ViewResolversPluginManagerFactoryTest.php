<?php
namespace HtTemplateResolverModuleTest\Factory;

use HtTemplateResolverModule\Factory\ViewResolversPluginManagerFactory;
use Zend\ServiceManager\ServiceManager;

class ViewResolversPluginManagerFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testFactory()
    {
        $factory = new ViewResolversPluginManagerFactory;
        $serviceManager = new ServiceManager;
        $serviceManager->setService(
            'Config', 
            [
                'ht_template_resolver' => [
                    'resolvers_plugin_manager' => [
                        'invokables' => [
                            'my_resolver' => 'Zend\View\Resolver\TemplatePathStack',
                        ]
                    ]
                ]
            ]
        );
        $resolversPluginManager = $factory->createService($serviceManager);
        $this->assertInstanceOf('HtTemplateResolverModule\View\Resolver\ResolversPluginManager', $resolversPluginManager);
        $this->assertTrue($resolversPluginManager->has('my_resolver'));
        $this->assertFalse($resolversPluginManager->has('resolver'));
    }
}
