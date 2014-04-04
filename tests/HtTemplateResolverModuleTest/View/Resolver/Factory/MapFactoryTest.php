<?php
namespace HtTemplateResolverModuleTest\View\Resolver\Factory;

use HtTemplateResolverModule\View\Resolver\Factory\MapFactory;
use Zend\ServiceManager\ServiceManager;

class MapFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testFactory()
    {
        $factory = new MapFactory;
        $resolvers = $this->getMock('Zend\ServiceManager\AbstractPluginManager');
        $serviceManager = new ServiceManager;
        $resolver = new \Zend\View\Resolver\TemplateMapResolver;
        $serviceManager->setService('ViewTemplateMapResolver', $resolver);
        $resolvers->expects($this->any())
            ->method('getServiceLocator')
            ->will($this->returnValue($serviceManager));
        $this->assertEquals($factory->createService($resolvers), $resolver);
    }
}
