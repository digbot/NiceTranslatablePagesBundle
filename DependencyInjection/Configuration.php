<?php

namespace Cadrone\NiceTranslatablePagesBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('cadrone_nice_translatable_pages');

        $rootNode
                ->children()
                    ->arrayNode("model")
                        ->children()
                            ->scalarNode("page_class")->isRequired()->cannotBeEmpty()->end()
                        ->end()
                    ->end()
                    ->arrayNode("sonata_admin")
                        ->addDefaultsIfNotSet()
                        ->children()
                            ->scalarNode("class")
                                ->defaultValue("Cadrone\NiceTranslatablePagesBundle\Admin\PageAdmin")
                                ->cannotBeEmpty()->end()
                            ->scalarNode("group")->defaultValue("Content")->end()
                            ->scalarNode("label")->defaultValue("Pages")->end()
                        ->end()
                    ->end()
                ->end()
        ;

        return $treeBuilder;
    }

}
