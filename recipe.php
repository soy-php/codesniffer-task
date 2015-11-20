<?php

$recipe = new \Soy\Recipe();

$recipe->component('default', function (\Soy\CodeSniffer\RunTask $codeSnifferTask) {
    $codeSnifferTask
        ->setBinary('phpcs')
        ->addTarget('src/Soy')
        ->addTarget('recipe.php')
        ->setVerbose(true)
        ->setThrowExceptionOnError(false)
        ->addIgnorePattern('**/*Task.php')
        ->addExtension('php')
        ->setReport(\Soy\CodeSniffer\RunTask::REPORT_FULL)
        ->setShowSniffs(true)
        ->run();
});

return $recipe;
