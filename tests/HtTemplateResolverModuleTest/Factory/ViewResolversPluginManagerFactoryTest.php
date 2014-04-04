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
                    'resolvers_plugin_manager' => []
                ]
            ]
        );
        $this->assertInstanceOf('HtTemplateResolverModule\View\Resolver\ResolversPluginManager', $factory->createService($serviceManager));
    }
}
