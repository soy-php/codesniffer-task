<?php

namespace Soy\PhpCodeSniffer;

use Soy\Task\CliTask;

class RunTask extends CliTask
{
    const REPORT_FULL = 'full';
    const REPORT_XML = 'xml';
    const REPORT_CHECKSTYLE = 'checkstyle';
    const REPORT_CSV = 'csv';
    const REPORT_JSON = 'json';
    const REPORT_EMACS = 'emacs';
    const REPORT_SOURCE = 'source';
    const REPORT_SUMMARY = 'summary';
    const REPORT_DIFF = 'diff';
    const REPORT_SVNBLAME = 'svnblame';
    const REPORT_GITBLAME = 'gitblame';
    const REPORT_HGBLAME = 'hgblame';
    const REPORT_NOTIFYSEND = 'notifysend';

    const STANDARD_MY_SOURCE = 'MySource';
    const STANDARD_PEAR = 'PEAR';
    const STANDARD_PHPCS = 'PHPCS';
    const STANDARD_PSR1 = 'PSR1';
    const STANDARD_PSR2 = 'PSR2';
    const STANDARD_SQUIZ = 'Squiz';
    const STANDARD_ZEND = 'Zend';

    /**
     * @var string
     */
    protected $binary = './vendor/bin/phpcs';

    /**
     * @var string
     */
    protected $standard = self::STANDARD_PSR2;

    /**
     * @var string
     */
    protected $report = self::REPORT_FULL;

    /**
     * @var array
     */
    protected $targets = [];

    /**
     * @var array
     */
    protected $ignorePatterns = [];

    /**
     * @var string
     */
    protected $reportFile;

    /**
     * @var bool
     */
    protected $showSniffs = false;

    /**
     * @var array
     */
    protected $extensions = [];

    /**
     * @return string
     */
    public function getCommand()
    {
        return $this->getBinary() . ' --standard=' . $this->getStandard() . ' '
            . (count($this->getIgnorePatterns()) > 0
                ? '--ignore=' . implode(',', $this->getIgnorePatterns()) . ' '
                : '')
            . (count($this->getExtensions()) > 0 ? '--extensions=' . implode(',', $this->getExtensions()) . ' ' : '')
            . '--report=' . $this->getReport() . ' '
            . ($this->getReportFile() !== null ? '--report-file=' . $this->getReportFile() . ' ' : '')
            . ($this->shouldShowSniffs() === true ? '-s ' : '')
            . (count($this->arguments) > 0 ? implode(' ', $this->getArguments()) . ' ' : '')
            . implode(' ', $this->getTargets());
    }

    /**
     * @return array
     */
    public function getTargets()
    {
        return $this->targets;
    }

    /**
     * @param array $targets
     * @return $this
     */
    public function setTargets(array $targets)
    {
        $this->targets = $targets;
        return $this;
    }

    /**
     * @param string $target
     * @return $this
     */
    public function addTarget($target)
    {
        $this->targets[] = $target;
        return $this;
    }

    /**
     * @return string
     */
    public function getStandard()
    {
        return $this->standard;
    }

    /**
     * @param string $standard
     * @return $this
     */
    public function setStandard($standard)
    {
        $this->standard = $standard;
        return $this;
    }

    /**
     * @return array
     */
    public function getIgnorePatterns()
    {
        return $this->ignorePatterns;
    }

    /**
     * @param string $ignorePattern
     * @return $this
     */
    public function addIgnorePattern($ignorePattern)
    {
        $this->ignorePatterns[] = $ignorePattern;
        return $this;
    }

    /**
     * @param array $ignorePatterns
     * @return $this
     */
    public function setIgnorePatterns(array $ignorePatterns)
    {
        $this->ignorePatterns = $ignorePatterns;
        return $this;
    }

    /**
     * @return string
     */
    public function getReport()
    {
        return $this->report;
    }

    /**
     * @param string $report
     * @return $this
     */
    public function setReport($report)
    {
        $this->report = $report;
        return $this;
    }

    /**
     * @return string
     */
    public function getReportFile()
    {
        return $this->reportFile;
    }

    /**
     * @param string $reportFile
     * @return $this
     */
    public function setReportFile($reportFile)
    {
        $this->reportFile = $reportFile;
        return $this;
    }

    /**
     * @return bool
     */
    public function shouldShowSniffs()
    {
        return $this->showSniffs;
    }

    /**
     * @param bool $showSniffs
     * @return $this
     */
    public function setShowSniffs($showSniffs)
    {
        $this->showSniffs = $showSniffs;
        return $this;
    }

    /**
     * @return array
     */
    public function getExtensions()
    {
        return $this->extensions;
    }

    /**
     * @param string $extension
     * @return $this
     */
    public function addExtension($extension)
    {
        $this->extensions[] = $extension;
        return $this;
    }

    /**
     * @param array $extensions
     * @return $this
     */
    public function setExtensions(array $extensions)
    {
        $this->extensions = $extensions;
        return $this;
    }
}
