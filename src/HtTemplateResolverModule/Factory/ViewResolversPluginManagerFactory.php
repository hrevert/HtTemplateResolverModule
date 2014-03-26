<?php
namespace HtTemplateResolverModule\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use HtTemplateResolverModule\View\Resolver\ResolversPluginManager;
use Zend\ServiceManager\Config;

class ViewResolversPluginManagerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $resolvers = new ResolversPluginManager(
            new Config($serviceLocator->get('Config')['ht_template_resolver']['resolvers_plugin_manager'])
        );
        $resolvers->setServiceLocator($serviceLocator);

        return $resolvers;
    }
}
