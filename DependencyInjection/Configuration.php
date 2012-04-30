<?php

namespace GreenFrog\Bundle\CmsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('green_frog_cms');

        $rootNode
            ->children()
                ->arrayNode('site')
                    ->children()
                        ->scalarNode('name')
                            ->defaultValue('Green Frog CMS')
                            ->cannotBeOverwritten()
                            ->cannotBeEmpty()
                        ->end()
                        ->scalarNode('title')
                            ->defaultValue('Homepage title')
                            ->cannotBeOverwritten()
                            ->cannotBeEmpty()
                        ->end()
                        ->scalarNode('page_title')
                            ->defaultValue('Homepage title')
                            ->cannotBeOverwritten()
                            ->cannotBeEmpty()
                        ->end()
                    ->end()
                ->end()
            ->end();

//        $this->addSeoSection($rootNode);

        return $treeBuilder;
    }
}