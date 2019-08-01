<?php

namespace vever001\ComposerInstallersDir;

use Composer\Installers\Installer as ComposerInstaller;
use Composer\Package\PackageInterface;

class Installer extends ComposerInstaller {

  public function getInstallPath(PackageInterface $package) {
    $installPath = parent::getInstallPath($package);
    $extra = $this->composer->getPackage()->getExtra();
    if (!empty($extra['installer-dir'])) {
      $installPath = rtrim($extra['installer-dir'], '/') . '/' . $installPath;
    }

    return $installPath;
  }

}
