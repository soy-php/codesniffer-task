# Code Sniffer Task

[![Latest Stable Version](https://poser.pugx.org/soy-php/codesniffer-task/v/stable)](https://packagist.org/packages/soy-php/codesniffer-task) [![Total Downloads](https://poser.pugx.org/soy-php/codesniffer-task/downloads)](https://packagist.org/packages/soy-php/codesniffer-task) [![Latest Unstable Version](https://poser.pugx.org/soy-php/codesniffer-task/v/unstable)](https://packagist.org/packages/soy-php/codesniffer-task) [![License](https://poser.pugx.org/soy-php/codesniffer-task/license)](https://packagist.org/packages/soy-php/codesniffer-task)

## Introduction
This is a [PHP Code Sniffer](https://github.com/squizlabs/PHP_CodeSniffer) task for Soy

## Usage
Include `soy-php/codesniffer-task` in your project with composer:

```sh
$ composer require soy-php/codesniffer-task
```

Then in your recipe you can use the task as follows:
```php
<?php

$recipe = new \Soy\Recipe();

$recipe->component('default', function (\Soy\CodeSniffer\CodeSnifferTask $codeSnifferTask) {
    $codeSnifferTask
        ->setBinary('phpcs')
        ->addTarget('src/Soy')
        ->addTarget('recipe.php')
        ->setVerbose(true)
        ->setThrowExceptionOnError(false)
        ->addIgnorePattern('**/*Task.php')
        ->addExtension('php')
        ->setReport(\Soy\CodeSniffer\CodeSnifferTask::REPORT_FULL)
        ->setShowSniffs(true)
        ->run();
});

return $recipe;
```
