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
