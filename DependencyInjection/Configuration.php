<?php

namespace Mbs\CorsGeneratorBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use Symfony\Component\Config\Definition\Builder\ScalarNodeDefinition;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('cors_generator');

        if (method_exists($treeBuilder, 'getRootNode')) {
            $rootNode = $treeBuilder->getRootNode();
        } else {
            $rootNode = $treeBuilder->root('cors_generator');
        }

        $rootNode
            ->children()
                ->append($this->getAllowCredentials())
                ->append($this->getAllowOrigin())
                ->append($this->getAllowHeaders())
                ->append($this->getAllowMethods())
                ->append($this->getMaxAge())
            ->end();

        return $treeBuilder;
    }

    private function getAllowCredentials(): ScalarNodeDefinition
    {
        $node = new ScalarNodeDefinition('allow_credentials');
        $node->defaultValue('%env(cors_generator_allow_credentials)%')->end();

        return $node;
    }

    private function getAllowOrigin(): ScalarNodeDefinition
    {
        $node = new ScalarNodeDefinition('allow_origin');

        $node
            ->defaultValue('%env(cors_generator_allow_origin)%')
            ->end()
        ;

        return $node;
    }

    private function getAllowHeaders(): ScalarNodeDefinition
    {
        $node = new ScalarNodeDefinition('allow_headers');

        $node
            ->defaultValue('%env(cors_generator_allow_headers)%')   
            ->end();

        return $node;
    }

    private function getAllowMethods(): ScalarNodeDefinition
    {
        $node = new ScalarNodeDefinition('allow_methods');

        $node->defaultValue('%env(cors_generator_allow_methods)%')->end();

        return $node;
    }

    private function getMaxAge(): ScalarNodeDefinition
    {
        $node = new ScalarNodeDefinition('max_age');

        $node
            ->defaultValue('%env(cors_generator_max_age)%')
            ->end()
        ;

        return $node;
    }
}
