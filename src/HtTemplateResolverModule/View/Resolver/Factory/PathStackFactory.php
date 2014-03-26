<?php
namespace HtTemplateResolverModule\View\Resolver\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PathStackFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $resolvers)
    {
        return $resolvers->getServiceLocator()->get('ViewTemplatePathStack');
    }
}
