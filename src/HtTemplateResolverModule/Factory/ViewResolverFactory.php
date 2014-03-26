<?php
namespace HtTemplateResolverModule\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\View\Resolver as ViewResolver;

class ViewResolverFactory implements FactoryInterface
{
    /**
     * Create the aggregate view resolver
     *
     * Creates a Zend\View\Resolver\AggregateResolver and attaches all the resolvers
     *
     * @param  ServiceLocatorInterface $serviceLocator
     * @return ViewResolver\AggregateResolver
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $resolver = new ViewResolver\AggregateResolver();
        $resolversManager = $serviceLocator->get('HtTemplateResolverModule\View\Resolver\ResolversPluginManager');
        $config = $serviceLocator->get('Config')['ht_template_resolver']['resolvers'];
        foreach ($config as $resolverName => $priority) {
            $resolver->attach($resolversManager->get($resolverName), $priority);
        }
        return $resolver;
    }
}
