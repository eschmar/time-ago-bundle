<?php

namespace Eschmar\TimeAgoBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * {@inheritDoc}
 */
class Configuration implements ConfigurationInterface
{
    const ROOT_NODE = 'eschmar_time_ago';

    /**
     * {@inheritdoc}
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder(static::ROOT_NODE);

        // BC layer for symfony/config 4.1 and older
        if (! \method_exists($treeBuilder, 'getRootNode')) {
            $rootNode = $treeBuilder->root(static::ROOT_NODE);
        } else {
            $rootNode = $treeBuilder->getRootNode();
        }

        $treeBuilder->getRootNode()
            ->children()
                ->scalarNode('format')
                    ->defaultValue('r')
                ->end()
            ->end();

        return $treeBuilder;
    }
}
