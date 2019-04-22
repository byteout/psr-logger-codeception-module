<?php

namespace Tests\Module;

use Codeception\Module;
use Codeception\TestInterface;
use Psr\Log\Test\TestLogger;

class PsrLogger extends Module
{
    /** @var TestLogger */
    private $logger;

    public function _before(TestInterface $test)
    {
        $this->logger = null;
    }

    /**
     * @return \Psr\Log\LoggerInterface
     */
    public function grabLogger()
    {
        return $this->logger = new TestLogger();
    }

    public function seeLoggerHasEmergency($record)
    {
        $this->assertTrue($this->logger->hasEmergency($record));
    }

    public function seeLoggerHasAlert($record)
    {
        $this->assertTrue($this->logger->hasAlert($record));
    }

    public function seeLoggerHasCritical($record)
    {
        $this->assertTrue($this->logger->hasCritical($record));
    }

    public function seeLoggerHasError($record)
    {
        $this->assertTrue($this->logger->hasError($record));
    }

    public function seeLoggerHasWarning($record)
    {
        $this->assertTrue($this->logger->hasWarning($record));
    }

    public function seeLoggerHasNotice($record)
    {
        $this->assertTrue($this->logger->hasNotice($record));
    }

    public function seeLoggerHasInfo($record)
    {
        $this->assertTrue($this->logger->hasInfo($record));
    }

    public function seeLoggerHasDebug($record)
    {
        $this->assertTrue($this->logger->hasDebug($record));
    }

    public function seeLoggerHasEmergencyRecords()
    {
        $this->assertTrue($this->logger->hasEmergencyRecords());
    }

    public function seeLoggerHasAlertRecords()
    {
        $this->assertTrue($this->logger->hasAlertRecords());
    }

    public function seeLoggerHasCriticalRecords()
    {
        $this->assertTrue($this->logger->hasCriticalRecords());
    }

    public function seeLoggerHasErrorRecords()
    {
        $this->assertTrue($this->logger->hasErrorRecords());
    }

    public function seeLoggerHasWarningRecords()
    {
        $this->assertTrue($this->logger->hasWarningRecords());
    }

    public function seeLoggerHasNoticeRecords()
    {
        $this->assertTrue($this->logger->hasNoticeRecords());
    }

    public function seeLoggerHasInfoRecords()
    {
        $this->assertTrue($this->logger->hasInfoRecords());
    }

    public function seeLoggerHasDebugRecords()
    {
        $this->assertTrue($this->logger->hasDebugRecords());
    }

    public function seeLoggerHasEmergencyThatContains($message)
    {
        $this->assertTrue($this->logger->hasEmergencyThatContains($message));
    }

    public function seeLoggerHasAlertThatContains($message)
    {
        $this->assertTrue($this->logger->hasAlertThatContains($message));
    }

    public function seeLoggerHasCriticalThatContains($message)
    {
        $this->assertTrue($this->logger->hasCriticalThatContains($message));
    }

    public function seeLoggerHasErrorThatContains($message)
    {
        $this->assertTrue($this->logger->hasErrorThatContains($message));
    }

    public function seeLoggerHasWarningThatContains($message)
    {
        $this->assertTrue($this->logger->hasWarningThatContains($message));
    }

    public function seeLoggerHasNoticeThatContains($message)
    {
        $this->assertTrue($this->logger->hasNoticeThatContains($message));
    }

    public function seeLoggerHasInfoThatContains($message)
    {
        $this->assertTrue($this->logger->hasInfoThatContains($message));
    }

    public function seeLoggerHasDebugThatContains($message)
    {
        $this->assertTrue($this->logger->hasDebugThatContains($message));
    }

    public function seeLoggerHasEmergencyThatMatches($message)
    {
        $this->assertTrue($this->logger->hasEmergencyThatMatches($message));
    }

    public function seeLoggerHasAlertThatMatches($message)
    {
        $this->assertTrue($this->logger->hasAlertThatMatches($message));
    }

    public function seeLoggerHasCriticalThatMatches($message)
    {
        $this->assertTrue($this->logger->hasCriticalThatMatches($message));
    }

    public function seeLoggerHasErrorThatMatches($message)
    {
        $this->assertTrue($this->logger->hasErrorThatMatches($message));
    }

    public function seeLoggerHasWarningThatMatches($message)
    {
        $this->assertTrue($this->logger->hasWarningThatMatches($message));
    }

    public function seeLoggerHasNoticeThatMatches($message)
    {
        $this->assertTrue($this->logger->hasNoticeThatMatches($message));
    }

    public function seeLoggerHasInfoThatMatches($message)
    {
        $this->assertTrue($this->logger->hasInfoThatMatches($message));
    }

    public function seeLoggerHasDebugThatMatches($message)
    {
        $this->assertTrue($this->logger->hasDebugThatMatches($message));
    }

    public function seeLoggerHasEmergencyThatPasses($message)
    {
        $this->assertTrue($this->logger->hasEmergencyThatPasses($message));
    }

    public function seeLoggerHasAlertThatPasses($message)
    {
        $this->assertTrue($this->logger->hasAlertThatPasses($message));
    }

    public function seeLoggerHasCriticalThatPasses($message)
    {
        $this->assertTrue($this->logger->hasCriticalThatPasses($message));
    }

    public function seeLoggerHasErrorThatPasses($message)
    {
        $this->assertTrue($this->logger->hasErrorThatPasses($message));
    }

    public function seeLoggerHasWarningThatPasses($message)
    {
        $this->assertTrue($this->logger->hasWarningThatPasses($message));
    }

    public function seeLoggerHasNoticeThatPasses($message)
    {
        $this->assertTrue($this->logger->hasNoticeThatPasses($message));
    }

    public function seeLoggerHasInfoThatPasses($message)
    {
        $this->assertTrue($this->logger->hasInfoThatPasses($message));
    }

    public function seeLoggerHasDebugThatPasses($message)
    {
        $this->assertTrue($this->logger->hasDebugThatPasses($message));
    }
}
