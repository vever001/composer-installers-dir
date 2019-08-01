<?php

namespace vever001\ComposerInstallersDir;

use Composer\Installers\Installer as ComposerInstaller;
use Composer\Package\PackageInterface;

class Installer extends ComposerInstaller {

  public function getInstallPath(PackageInterface $package) {
    $installPath = parent::getInstallPath($package);
    $distDir = $this->composer->getConfig()->get('extra.installer-dir');
    if (!empty($distDir)) {
      $installPath = rtrim($distDir, '/') . '/' . $installPath;
    }
    return $installPath;
  }

}
