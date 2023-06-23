<?php

declare(strict_types=1);

/*
 * This file is part of ex-akt/contao-webpack-config-bundle.
 *
 * (c) ex-akt.de
 *
 * @license LGPL-3.0-or-later
 */

namespace Exakt\ContaoWebpackConfigBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class ContaoWebpackConfigExtension extends Extension implements PrependExtensionInterface
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../../config'));
        $loader->load('services.yml');
    }

    public function prepend(ContainerBuilder $container): void
    {
        $frameworkConfig = $container->getExtensionConfig('framework');
        $frameworkConfig['assets']['json_manifest_path'] = '%kernel.project_dir%/public/layout/manifest.json';

        $container->prependExtensionConfig('framework', [
            'assets' => $frameworkConfig['assets'],
        ]);
    }
}
