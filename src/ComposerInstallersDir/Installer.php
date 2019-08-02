<?php

namespace vever001\ComposerInstallersDir;

use Composer\Installers\Installer as ComposerInstaller;
use Composer\Package\PackageInterface;
use Composer\Util\Filesystem;

class Installer extends ComposerInstaller {

  public function getInstallPath(PackageInterface $package) {
    $installPath = parent::getInstallPath($package);

    $extra = $this->composer->getPackage()->getExtra();
    if (!empty($extra['installer-dir'])) {
      $filesystem = new Filesystem();
      $installerDir = $filesystem->normalizePath($extra['installer-dir']);
      $installPath = $installerDir . '/' . $installPath;
    }

    return $installPath;
  }

}
