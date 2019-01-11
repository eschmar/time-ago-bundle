<?php

namespace Eschmar\TimeAgoBundle\DependencyInjection;

use Eschmar\TimeAgoBundle\Twig\TimeAgoExtension;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('eschmar_time_ago');

        $rootNode
            ->children()
                ->scalarNode('format')
                    ->defaultValue('r')
                ->end()
                ->scalarNode('threshold')
                    ->defaultValue(TimeAgoExtension::WEEK)
                ->end()
            ->end();

        return $treeBuilder;
    }
}
