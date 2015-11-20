# PHP Code Sniffer Task

[![Latest Stable Version](https://poser.pugx.org/soy-php/phpcs-task/v/stable)](https://packagist.org/packages/soy-php/phpcs-task) [![Total Downloads](https://poser.pugx.org/soy-php/phpcs-task/downloads)](https://packagist.org/packages/soy-php/phpcs-task) [![Latest Unstable Version](https://poser.pugx.org/soy-php/phpcs-task/v/unstable)](https://packagist.org/packages/soy-php/phpcs-task) [![License](https://poser.pugx.org/soy-php/phpcs-task/license)](https://packagist.org/packages/soy-php/phpcs-task)

## Introduction
This is a [PHP Code Sniffer](https://github.com/squizlabs/PHP_CodeSniffer) task for [Soy](https://github.com/soy-php/soy)

## Usage
Include `soy-php/phpcs-task` in your project with composer:

```sh
$ composer require soy-php/phpcs-task
```

Then in your recipe you can use the task as follows:
```php
<?php

$recipe = new \Soy\Recipe();

$recipe->component('default', function (\Soy\PhpCodeSniffer\RunTask $codeSnifferTask) {
    $codeSnifferTask
        ->setBinary('phpcs')
        ->addTarget('src/Soy')
        ->addTarget('recipe.php')
        ->setVerbose(true)
        ->setThrowExceptionOnError(false)
        ->addIgnorePattern('**/*Task.php')
        ->addExtension('php')
        ->setReport(\Soy\PhpCodeSniffer\RunTask::REPORT_FULL)
        ->setShowSniffs(true)
        ->addArgument('-v')
        ->run();
});

return $recipe;
```
