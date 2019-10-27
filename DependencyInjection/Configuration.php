<?php

namespace Eschmar\TimeAgoBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    const ROOT_NODE = 'eschmar_time_ago';

    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder(static::ROOT_NODE);

        // Symfony 4.2+
        if (method_exists($treeBuilder, 'getRootNode')) $rootNode = $treeBuilder->getRootNode();
        // Symfony 4.1 and below
        else $rootNode = $treeBuilder->root(static::ROOT_NODE);

        $treeBuilder->getRootNode()
            ->children()
                ->scalarNode('format')
                    ->defaultValue('r')
                ->end()
            ->end();

        return $treeBuilder;
    }
}
