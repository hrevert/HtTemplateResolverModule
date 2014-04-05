<?php
namespace HtTemplateResolverModule\View\Resolver;

use Zend\ServiceManager\AbstractPluginManager;
use Zend\View\Resolver\ResolverInterface;
use HtTemplateResolverModule\Exception;

class ResolversPluginManager extends AbstractPluginManager 
{
    protected $factories = [
        'map'       => 'HtTemplateResolverModule\View\Resolver\Factory\MapFactory',
        'pathstack' => 'HtTemplateResolverModule\View\Resolver\Factory\PathStackFactory',
    ];

    /**
     * {@inheritDoc}
     */
    public function validatePlugin($plugin)
    {
        if ($plugin instanceof ResolverInterface) {
            return; // we're okay
        }

        throw new Exception\RuntimeException(sprintf(
            'Resolver must implement "Zend\View\Resolver\ResolverInterface", but "%s" was given',
            is_object($plugin) ? get_class($plugin) : gettype($plugin)
        ));
    }
}
