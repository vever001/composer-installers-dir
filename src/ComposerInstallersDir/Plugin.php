<?php

namespace vever001\ComposerInstallersDir;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class Plugin implements PluginInterface {

  public function activate(Composer $composer, IOInterface $io) {
    $installer = new Installer($io, $composer);
    $composer->getInstallationManager()->addInstaller($installer);
  }

}
