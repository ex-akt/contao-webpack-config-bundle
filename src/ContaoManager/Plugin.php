<?php

declare(strict_types=1);

/*
 * This file is part of ex-akt/contao-webpack-config-bundle.
 *
 * (c) ex-akt.de
 *
 * @license LGPL-3.0-or-later
 */

namespace Exakt\ContaoWebpackConfigBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Exakt\ContaoWebpackConfigBundle\ContaoWebpackConfigBundle;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(ContaoWebpackConfigBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}
