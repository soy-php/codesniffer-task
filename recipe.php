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
