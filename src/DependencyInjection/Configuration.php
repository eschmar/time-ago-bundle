<?php

namespace Eschmar\TimeAgoBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * {@inheritDoc}
 */
class Configuration implements ConfigurationInterface
{
    public const ROOT_NODE = 'eschmar_time_ago';

    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder(static::ROOT_NODE);
        $rootNode = $treeBuilder->getRootNode();

        $treeBuilder->getRootNode()
            ->children()
                ->scalarNode('format')
                    ->defaultValue('r')
                ->end()
            ->end();

        return $treeBuilder;
    }
}
