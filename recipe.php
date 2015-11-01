<?php

$recipe = new \Soy\Recipe();

$recipe->component('phpcs', function (\Soy\CodeSniffer\CodeSnifferTask $codeSnifferTask) {
    $codeSnifferTask
        ->setBinary('phpcs')
        ->addTarget('src/Soy')
        ->addTarget('recipe.php')
        ->setVerbose(true)
        ->setThrowExceptionOnError(false)
        ->addIgnorePattern('**/*Task.php')
        ->setReport(\Soy\CodeSniffer\CodeSnifferTask::REPORT_FULL)
        ->setShowSniffs(true)
        ->run();
});

$recipe->component('default', null, ['phpcs']);

return $recipe;
