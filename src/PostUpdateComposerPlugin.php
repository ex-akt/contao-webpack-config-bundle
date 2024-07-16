<?php

declare(strict_types=1);

/*
 * This file is part of ex-akt/contao-webpack-config-bundle.
 *
 * (c) ex-akt.de
 *
 * @license LGPL-3.0-or-later
 */

namespace Exakt\ContaoWebpackConfigBundle;

use Composer\Composer;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
use Composer\Script\Event;
use Composer\Util\ProcessExecutor;

class PostUpdateComposerPlugin implements PluginInterface, EventSubscriberInterface
{
    public function activate(Composer $composer, IOInterface $io): void
    {
        // Aktivierungslogik
    }

    public function deactivate(Composer $composer, IOInterface $io): void
    {
        // Deaktivierungslogik, falls erforderlich
    }

    public function uninstall(Composer $composer, IOInterface $io): void
    {
        // Deinstallationslogik, falls erforderlich
    }

    public static function getSubscribedEvents()
    {
        return [
            'post-install-cmd' => 'onPostInstallUpdate',
            'post-update-cmd' => 'onPostInstallUpdate',
        ];
    }

    public function onPostInstallUpdate(Event $event): void
    {
        $io = $event->getIO();
        $executor = new ProcessExecutor($io);

        $io->write('Running npm install...');
        $executor->execute('npm --prefix vendor/ex-akt/contao-webpack-config-bundle install', $output);

        $io->write($output);
    }
}
