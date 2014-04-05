<?php
namespace HtTemplateResolverModule;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ModuleManager\Feature\InitProviderInterface;
use Zend\ModuleManager\ModuleManagerInterface;

class Module implements 
    InitProviderInterface,
    AutoloaderProviderInterface,
    ConfigProviderInterface,
    ServiceProviderInterface
{

    /**
     * {@inheritDoc}
     */
    public function init(ModuleManagerInterface $moduleManager)
    {
        $serviceManager = $moduleManager->getEvent()->getParam('ServiceManager');
        // We need to override services defined in the service listener
        $serviceManager->setAllowOverride(true);
    }


    /**
     * {@inheritDoc}
     */
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    /**
     * {@inheritDoc}
     */
    public function getAutoloaderConfig()
    {
        return [
            'Zend\Loader\ClassMapAutoloader' => [
                __DIR__ . '/../autoload_classmap.php',
            ],
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__,
                ],
            ],
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function getServiceConfig()
    {
        return [
            'factories' => [
                'HtTemplateResolverModule\View\Resolver\ResolversPluginManager'
                    => 'HtTemplateResolverModule\Factory\ViewResolversPluginManagerFactory',
                'HtTemplateResolverModule\View\Resolver\AggregateResolver'
                    => 'HtTemplateResolverModule\Factory\ViewResolverFactory',
            ],
            'aliases' => [
                'ViewResolver' => 'HtTemplateResolverModule\View\Resolver\AggregateResolver',
            ]
        ];
    }
}
