<?php
namespace HtTemplateResolverModuleTest\View\Resolver\Factory;

use HtTemplateResolverModule\View\Resolver\Factory\PathStackFactory;
use Zend\ServiceManager\ServiceManager;

class PathStackFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testFactory()
    {
        $factory = new PathStackFactory;
        $resolvers = $this->getMock('Zend\ServiceManager\AbstractPluginManager');
        $serviceManager = new ServiceManager;
        $resolver = new \Zend\View\Resolver\TemplatePathStack;
        $serviceManager->setService('ViewTemplatePathStack', $resolver);
        $resolvers->expects($this->any())
            ->method('getServiceLocator')
            ->will($this->returnValue($serviceManager));
        $this->assertEquals($factory->createService($resolvers), $resolver);
    }
}
