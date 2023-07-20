<?php

declare(strict_types=1);

/*
 * This file is part of ex-akt/contao-webpack-config-bundle.
 *
 * (c) ex-akt.de
 *
 * @license LGPL-3.0-or-later
 */

namespace Exakt\ContaoWebpackConfigBundle\Tests;

use Exakt\ContaoWebpackConfigBundle\ContaoWebpackConfigBundle;
use PHPUnit\Framework\TestCase;

class ContaoWebpackConfigBundleTest extends TestCase
{
    public function testCanBeInstantiated(): void
    {
        $bundle = new ContaoWebpackConfigBundle();

        $this->assertInstanceOf('Exakt\ContaoWebpackConfigBundle\ContaoWebpackConfigBundle', $bundle);
    }
}
