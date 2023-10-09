<?php

namespace Mbs\CorsGeneratorBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Mbs\CorsGeneratorBundle\EventListener\ResponseListener;
use Mbs\CorsGeneratorBundle\DependencyInjection\CorsGeneratorExtension;

class CorsGeneratorBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->registerExtension(new CorsGeneratorExtension());
    }

    public function getContainerExtension()
    {
        return new CorsGeneratorExtension();
    }

    public function getPath(): string
    {
        return \dirname(__DIR__);
    } 
}