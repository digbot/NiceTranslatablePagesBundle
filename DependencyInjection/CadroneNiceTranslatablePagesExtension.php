<?php

namespace Cadrone\NiceTranslatablePagesBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

class CadroneNiceTranslatablePagesExtension extends Extension
{

    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter("cadrone.nice_pages.page_class", $config["model"]["page_class"]);
        $container->setParameter("cadrone.nice_pages.sonata_admin_class", $config["sonata_admin"]["class"]);
        $container->setParameter("cadrone.nice_pages.sonata_admin_group", $config["sonata_admin"]["group"]);
        $container->setParameter("cadrone.nice_pages.sonata_admin_label", $config["sonata_admin"]["label"]);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.xml');
    }

}

