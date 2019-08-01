# Composer Installers Dir

The `composer-installers-dir` is a small composer plugin that allows you to specify a directory where all packages
handled by `composer/installers` will be downloaded to.

Composer supports overriding the vendor location using `vendor-dir` out of the box.
This is not the case for packages using `composer/installers`.
This project allows you to define similarly an `installer-dir` in the `extra` section of your `composer.json`.

To install it:
```sh
composer require vever001/composer-installers-dir
```

This is useful if you have a composer project and you want to build it to another folder (e.g: for production release).
Here's an example to build the whole project in a `dist` folder:
```sh
DIR="dist"
composer config vendor-dir "$DIR/vendor"
composer config extra.installer-dir "$DIR"
composer install --no-dev
composer config --unset extra.installer-dir
composer config --unset vendor-dir
cp composer.json $DIR
cd $DIR && composer dump-autoload --no-dev --optimize
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
  - Build the project to the `dist` folder (with `--no-dev`)
  - Revert the changes to the `composer.json`
  - Copy the `composer.json` to the `dist` folder
  - Move to the `dist` folder
  - Update the autoloader (with `--optimize`) to resolve paths
