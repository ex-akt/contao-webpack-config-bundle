<?php

declare(strict_types=1);

/*
 * This file is part of [package name].
 *
 * (c) John Doe
 *
 * @license LGPL-3.0-or-later
 */

namespace Exakt\ContaoWebpackConfigBundle;

use Exakt\ContaoWebpackConfigBundle\DependencyInjection\ContaoWebpackConfigExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class ContaoWebpackConfigBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

    public function getContainerExtension(): ContaoWebpackConfigExtension
    {
        return new ContaoWebpackConfigExtension();
    }
}
