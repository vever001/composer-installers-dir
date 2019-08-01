# Composer Installers Dir

The `composer-installers-dir` is a small composer plugin that allows you to specify a directory where all packages
handled by `composer/installers` will be downloaded to.

This is useful if you have a composer.json and you want to build the project to another folder.
Here's an example to build the whole project in a `dist` folder using `--no-dev`:
```sh
composer config vendor-dir "dist/vendor"
composer config extra.installer-dir "dist"
composer install --no-dev
composer config --unset extra.installer-dir
composer config --unset vendor-dir
```

Which will:
  - Add the following in the composer.json
    ```
      "extra": {
        ...
        "installer-dir": "dist"
      },
      "config": {
        ...
        "vendor-dir": "dist/vendor"
      }
    ```
  - Build the project with `--no-dev`
  - And finally remove the changes to the composer.json
