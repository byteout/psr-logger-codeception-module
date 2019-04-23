<?php

namespace Byteout\Codeception\Module;

use Codeception\Module;
use Codeception\TestInterface;
use Psr\Log\Test\TestLogger;

class PsrLogger extends Module
{
    /** @var TestLogger */
    private $logger;

    public function _before(TestInterface $test)
    {
        $this->logger = new TestLogger();
    }

    /**
     * @return \Psr\Log\LoggerInterface
     */
    public function grabLogger()
    {
        return $this->logger;
    }

    /**
     * @param string $message
     * @param array $context
     */
    public function haveEmergency($message, array $context = [])
    {
        $this->logger->emergency($message, $context);
    }

    /**
     * @param string $message
     * @param array $context
     */
    public function haveAlert($message, array $context = [])
    {
        $this->logger->alert($message, $context);
    }

    /**
     * @param string $message
     * @param array $context
     */
    public function haveCritical($message, array $context = [])
    {
        $this->logger->critical($message, $context);
    }

    /**
     * @param string $message
     * @param array $context
     */
    public function haveError($message, array $context = [])
    {
        $this->logger->error($message, $context);
    }

    /**
     * @param string $message
     * @param array $context
     */
    public function haveWarning($message, array $context = [])
    {
        $this->logger->warning($message, $context);
    }

    /**
     * @param string $message
     * @param array $context
     */
    public function haveNotice($message, array $context = [])
    {
        $this->logger->notice($message, $context);
    }

    /**
     * @param string $message
     * @param array $context
     */
    public function haveInfo($message, array $context = [])
    {
        $this->logger->info($message, $context);
    }

    /**
     * @param string $message
     * @param array $context
     */
    public function haveDebug($message, array $context = [])
    {
        $this->logger->debug($message, $context);
    }

    /**
     * @param string $message
     * @param array|null $context
     */
    public function seeLoggerHasEmergency($message, array $context = null)
    {
        $this->assertTrue(
            $this->isRecordLogged('hasEmergency', $message, $context),
            sprintf(
                'Failed asserting that emergency "%s"%s has been logged.',
                $message,
                $context !== null ? ' (with context)' : ''
            )
        );
    }

    /**
     * @param string     $message
     * @param array|null $context
     */
    public function dontSeeLoggerHasEmergency($message, array $context = null)
    {
        $this->assertFalse(
            $this->isRecordLogged('hasEmergency', $message, $context),
            sprintf(
                'Failed asserting that emergency "%s"%s has not been logged.',
                $message,
                $context !== null ? ' (with context)' : ''
            )
        );
    }

    /**
     * @param string     $message
     * @param array|null $context
     */
    public function seeLoggerHasAlert($message, array $context = null)
    {
        $this->assertTrue(
            $this->isRecordLogged('hasAlert', $message, $context),
            sprintf(
                'Failed asserting that alert "%s"%s has been logged.',
                $message,
                $context !== null ? ' (with context)' : ''
            )
        );
    }

    /**
     * @param string     $message
     * @param array|null $context
     */
    public function dontSeeLoggerHasAlert($message, array $context = null)
    {
        $this->assertFalse(
            $this->isRecordLogged('hasAlert', $message, $context),
            sprintf(
                'Failed asserting that alert "%s"%s has not been logged.',
                $message,
                $context !== null ? ' (with context)' : ''
            )
        );
    }

    /**
     * @param string     $message
     * @param array|null $context
     */
    public function seeLoggerHasCritical($message, array $context = null)
    {
        $this->assertTrue(
            $this->isRecordLogged('hasCritical', $message, $context),
            sprintf(
                'Failed asserting that critical "%s"%s has been logged.',
                $message,
                $context !== null ? ' (with context)' : ''
            )
        );
    }

    /**
     * @param string     $message
     * @param array|null $context
     */
    public function dontSeeLoggerHasCritical($message, array $context = null)
    {
        $this->assertFalse(
            $this->isRecordLogged('hasCritical', $message, $context),
            sprintf(
                'Failed asserting that critical "%s"%s has not been logged.',
                $message,
                $context !== null ? ' (with context)' : ''
            )
        );
    }

    /**
     * @param string     $message
     * @param array|null $context
     */
    public function seeLoggerHasError($message, array $context = null)
    {
        $this->assertTrue(
            $this->isRecordLogged('hasError', $message, $context),
            sprintf(
                'Failed asserting that error "%s"%s has been logged.',
                $message,
                $context !== null ? ' (with context)' : ''
            )
        );
    }

    /**
     * @param string     $message
     * @param array|null $context
     */
    public function dontSeeLoggerHasError($message, array $context = null)
    {
        $this->assertFalse(
            $this->isRecordLogged('hasError', $message, $context),
            sprintf(
                'Failed asserting that error "%s"%s has not been logged.',
                $message,
                $context !== null ? ' (with context)' : ''
            )
        );
    }

    /**
     * @param string     $message
     * @param array|null $context
     */
    public function seeLoggerHasWarning($message, array $context = null)
    {
        $this->assertTrue(
            $this->isRecordLogged('hasWarning', $message, $context),
            sprintf(
                'Failed asserting that warning "%s"%s has been logged.',
                $message,
                $context !== null ? ' (with context)' : ''
            )
        );
    }

    /**
     * @param string     $message
     * @param array|null $context
     */
    public function dontSeeLoggerHasWarning($message, array $context = null)
    {
        $this->assertFalse(
            $this->isRecordLogged('hasWarning', $message, $context),
            sprintf(
                'Failed asserting that warning "%s"%s has not been logged.',
                $message,
                $context !== null ? ' (with context)' : ''
            )
        );
    }

    /**
     * @param string     $message
     * @param array|null $context
     */
    public function seeLoggerHasNotice($message, array $context = null)
    {
        $this->assertTrue(
            $this->isRecordLogged('hasNotice', $message, $context),
            sprintf(
                'Failed asserting that notice "%s"%s has been logged.',
                $message,
                $context !== null ? ' (with context)' : ''
            )
        );
    }

    /**
     * @param string     $message
     * @param array|null $context
     */
    public function dontSeeLoggerHasNotice($message, array $context = null)
    {
        $this->assertFalse(
            $this->isRecordLogged('hasNotice', $message, $context),
            sprintf(
                'Failed asserting that notice "%s"%s has not been logged.',
                $message,
                $context !== null ? ' (with context)' : ''
            )
        );
    }

    /**
     * @param string     $message
     * @param array|null $context
     */
    public function seeLoggerHasInfo($message, array $context = null)
    {
        $this->assertTrue(
            $this->isRecordLogged('hasInfo', $message, $context),
            sprintf(
                'Failed asserting that info "%s"%s has been logged.',
                $message,
                $context !== null ? ' (with context)' : ''
            )
        );
    }

    /**
     * @param string     $message
     * @param array|null $context
     */
    public function dontSeeLoggerHasInfo($message, array $context = null)
    {
        $this->assertFalse(
            $this->isRecordLogged('hasInfo', $message, $context),
            sprintf(
                'Failed asserting that info "%s"%s has not been logged.',
                $message,
                $context !== null ? ' (with context)' : ''
            )
        );
    }

    /**
     * @param string     $message
     * @param array|null $context
     */
    public function seeLoggerHasDebug($message, array $context = null)
    {
        $this->assertTrue(
            $this->isRecordLogged('hasDebug', $message, $context),
            sprintf(
                'Failed asserting that debug "%s"%s has been logged.',
                $message,
                $context !== null ? ' (with context)' : ''
            )
        );
    }

    /**
     * @param string     $message
     * @param array|null $context
     */
    public function dontSeeLoggerHasDebug($message, array $context = null)
    {
        $this->assertFalse(
            $this->isRecordLogged('hasDebug', $message, $context),
            sprintf(
                'Failed asserting that debug "%s"%s has not been logged.',
                $message,
                $context !== null ? ' (with context)' : ''
            )
        );
    }

    public function seeLoggerHasAnyEmergency()
    {
        $this->assertTrue(
            $this->logger->hasEmergencyRecords(),
            'Failed asserting that any emergency was logged.'
        );
    }

    public function dontSeeLoggerHasAnyEmergency()
    {
        $this->assertFalse(
            $this->logger->hasEmergencyRecords(),
            'Failed asserting that no emergency was logged.'
        );
    }

    public function seeLoggerHasAnyAlert()
    {
        $this->assertTrue(
            $this->logger->hasAlertRecords(),
            'Failed asserting that any alert was logged.'
        );
    }

    public function dontSeeLoggerHasAnyAlert()
    {
        $this->assertFalse(
            $this->logger->hasAlertRecords(),
            'Failed asserting that no alert was logged.'
        );
    }

    public function seeLoggerHasAnyCritical()
    {
        $this->assertTrue(
            $this->logger->hasCriticalRecords(),
            'Failed asserting that any critical was logged.'
        );
    }

    public function dontSeeLoggerHasAnyCritical()
    {
        $this->assertFalse(
            $this->logger->hasCriticalRecords(),
            'Failed asserting that no critical was logged.'
        );
    }

    public function seeLoggerHasAnyError()
    {
        $this->assertTrue(
            $this->logger->hasErrorRecords(),
            'Failed asserting that any error was logged.'
        );
    }

    public function dontSeeLoggerHasAnyError()
    {
        $this->assertFalse(
            $this->logger->hasErrorRecords(),
            'Failed asserting that no error was logged.'
        );
    }

    public function seeLoggerHasAnyWarning()
    {
        $this->assertTrue(
            $this->logger->hasWarningRecords(),
            'Failed asserting that any warning was logged.'
        );
    }

    public function dontSeeLoggerHasAnyWarning()
    {
        $this->assertFalse(
            $this->logger->hasWarningRecords(),
            'Failed asserting that no warning was logged.'
        );
    }

    public function seeLoggerHasAnyNotice()
    {
        $this->assertTrue(
            $this->logger->hasNoticeRecords(),
            'Failed asserting that any notice was logged.'
        );
    }

    public function dontSeeLoggerHasAnyNotice()
    {
        $this->assertFalse(
            $this->logger->hasNoticeRecords(),
            'Failed asserting that no notice was logged.'
        );
    }

    public function seeLoggerHasAnyInfo()
    {
        $this->assertTrue(
            $this->logger->hasInfoRecords(),
            'Failed asserting that any info was logged.'
        );
    }

    public function dontSeeLoggerHasAnyInfo()
    {
        $this->assertFalse(
            $this->logger->hasInfoRecords(),
            'Failed asserting that no info was logged.'
        );
    }

    public function seeLoggerHasAnyDebug()
    {
        $this->assertTrue(
            $this->logger->hasDebugRecords(),
            'Failed asserting that any debug was logged.'
        );
    }

    public function dontSeeLoggerHasAnyDebug()
    {
        $this->assertFalse(
            $this->logger->hasDebugRecords(),
            'Failed asserting that no debug was logged.'
        );
    }

    /**
     * @param string $message
     */
    public function seeLoggerHasEmergencyThatContains($message)
    {
        $this->assertTrue(
            $this->logger->hasEmergencyThatContains($message),
            sprintf('Failed asserting that emergency containing "%s" has been logged.', $message)
        );
    }

    /**
     * @param string $message
     */
    public function dontSeeLoggerHasEmergencyThatContains($message)
    {
        $this->assertFalse(
            $this->logger->hasEmergencyThatContains($message),
            sprintf('Failed asserting that emergency containing "%s" has not been logged.', $message)
        );
    }

    /**
     * @param string $message
     */
    public function seeLoggerHasAlertThatContains($message)
    {
        $this->assertTrue(
            $this->logger->hasAlertThatContains($message),
            sprintf('Failed asserting that alert containing "%s" has been logged.', $message)
        );
    }

    /**
     * @param string $message
     */
    public function dontSeeLoggerHasAlertThatContains($message)
    {
        $this->assertFalse(
            $this->logger->hasAlertThatContains($message),
            sprintf('Failed asserting that alert containing "%s" has not been logged.', $message)
        );
    }

    /**
     * @param string $message
     */
    public function seeLoggerHasCriticalThatContains($message)
    {
        $this->assertTrue(
            $this->logger->hasCriticalThatContains($message),
            sprintf('Failed asserting that critical containing "%s" has been logged.', $message)
        );
    }

    /**
     * @param string $message
     */
    public function dontSeeLoggerHasCriticalThatContains($message)
    {
        $this->assertFalse(
            $this->logger->hasCriticalThatContains($message),
            sprintf('Failed asserting that critical containing "%s" has not been logged.', $message)
        );
    }

    /**
     * @param string $message
     */
    public function seeLoggerHasErrorThatContains($message)
    {
        $this->assertTrue(
            $this->logger->hasErrorThatContains($message),
            sprintf('Failed asserting that error containing "%s" has been logged.', $message)
        );
    }

    /**
     * @param string $message
     */
    public function dontSeeLoggerHasErrorThatContains($message)
    {
        $this->assertFalse(
            $this->logger->hasErrorThatContains($message),
            sprintf('Failed asserting that error containing "%s" has not been logged.', $message)
        );
    }

    /**
     * @param string $message
     */
    public function seeLoggerHasWarningThatContains($message)
    {
        $this->assertTrue(
            $this->logger->hasWarningThatContains($message),
            sprintf('Failed asserting that warning containing "%s" has been logged.', $message)
        );
    }

    /**
     * @param string $message
     */
    public function dontSeeLoggerHasWarningThatContains($message)
    {
        $this->assertFalse(
            $this->logger->hasWarningThatContains($message),
            sprintf('Failed asserting that warning containing "%s" has not been logged.', $message)
        );
    }

    /**
     * @param string $message
     */
    public function seeLoggerHasNoticeThatContains($message)
    {
        $this->assertTrue(
            $this->logger->hasNoticeThatContains($message),
            sprintf('Failed asserting that notice containing "%s" has been logged.', $message)
        );
    }

    /**
     * @param string $message
     */
    public function dontSeeLoggerHasNoticeThatContains($message)
    {
        $this->assertFalse(
            $this->logger->hasNoticeThatContains($message),
            sprintf('Failed asserting that notice containing "%s" has not been logged.', $message)
        );
    }

    /**
     * @param string $message
     */
    public function seeLoggerHasInfoThatContains($message)
    {
        $this->assertTrue(
            $this->logger->hasInfoThatContains($message),
            sprintf('Failed asserting that info containing "%s" has been logged.', $message)
        );
    }

    /**
     * @param string $message
     */
    public function dontSeeLoggerHasInfoThatContains($message)
    {
        $this->assertFalse(
            $this->logger->hasInfoThatContains($message),
            sprintf('Failed asserting that info containing "%s" has not been logged.', $message)
        );
    }

    /**
     * @param string $message
     */
    public function seeLoggerHasDebugThatContains($message)
    {
        $this->assertTrue(
            $this->logger->hasDebugThatContains($message),
            sprintf('Failed asserting that debug containing "%s" has been logged.', $message)
        );
    }

    /**
     * @param string $message
     */
    public function dontSeeLoggerHasDebugThatContains($message)
    {
        $this->assertFalse(
            $this->logger->hasDebugThatContains($message),
            sprintf('Failed asserting that debug containing "%s" has not been logged.', $message)
        );
    }

    /**
     * @param string $regex
     */
    public function seeLoggerHasEmergencyThatMatchesRegex($regex)
    {
        $this->assertTrue(
            $this->logger->hasEmergencyThatMatches($regex),
            sprintf('Failed asserting that emergency matching regex "%s" has been logged.', $regex)
        );
    }

    /**
     * @param string $regex
     */
    public function dontSeeLoggerHasEmergencyThatMatchesRegex($regex)
    {
        $this->assertFalse(
            $this->logger->hasEmergencyThatMatches($regex),
            sprintf('Failed asserting that emergency matching regex "%s" has not been logged.', $regex)
        );
    }

    /**
     * @param string $regex
     */
    public function seeLoggerHasAlertThatMatchesRegex($regex)
    {
        $this->assertTrue(
            $this->logger->hasAlertThatMatches($regex),
            sprintf('Failed asserting that alert matching regex "%s" has been logged.', $regex)
        );
    }

    /**
     * @param string $regex
     */
    public function dontSeeLoggerHasAlertThatMatchesRegex($regex)
    {
        $this->assertFalse(
            $this->logger->hasAlertThatMatches($regex),
            sprintf('Failed asserting that alert matching regex "%s" has not been logged.', $regex)
        );
    }

    /**
     * @param string $regex
     */
    public function seeLoggerHasCriticalThatMatchesRegex($regex)
    {
        $this->assertTrue(
            $this->logger->hasCriticalThatMatches($regex),
            sprintf('Failed asserting that critical matching regex "%s" has been logged.', $regex)
        );
    }

    /**
     * @param string $regex
     */
    public function dontSeeLoggerHasCriticalThatMatchesRegex($regex)
    {
        $this->assertFalse(
            $this->logger->hasCriticalThatMatches($regex),
            sprintf('Failed asserting that critical matching regex "%s" has not been logged.', $regex)
        );
    }

    /**
     * @param string $regex
     */
    public function seeLoggerHasErrorThatMatchesRegex($regex)
    {
        $this->assertTrue(
            $this->logger->hasErrorThatMatches($regex),
            sprintf('Failed asserting that error matching regex "%s" has been logged.', $regex)
        );
    }

    /**
     * @param string $regex
     */
    public function dontSeeLoggerHasErrorThatMatchesRegex($regex)
    {
        $this->assertFalse(
            $this->logger->hasErrorThatMatches($regex),
            sprintf('Failed asserting that error matching regex "%s" has not been logged.', $regex)
        );
    }

    /**
     * @param string $regex
     */
    public function seeLoggerHasWarningThatMatchesRegex($regex)
    {
        $this->assertTrue(
            $this->logger->hasWarningThatMatches($regex),
            sprintf('Failed asserting that warning matching regex "%s" has been logged.', $regex)
        );
    }

    /**
     * @param string $regex
     */
    public function dontSeeLoggerHasWarningThatMatchesRegex($regex)
    {
        $this->assertFalse(
            $this->logger->hasWarningThatMatches($regex),
            sprintf('Failed asserting that warning matching regex "%s" has not been logged.', $regex)
        );
    }

    /**
     * @param string $regex
     */
    public function seeLoggerHasNoticeThatMatchesRegex($regex)
    {
        $this->assertTrue(
            $this->logger->hasNoticeThatMatches($regex),
            sprintf('Failed asserting that notice matching regex "%s" has been logged.', $regex)
        );
    }

    /**
     * @param string $regex
     */
    public function dontSeeLoggerHasNoticeThatMatchesRegex($regex)
    {
        $this->assertFalse(
            $this->logger->hasNoticeThatMatches($regex),
            sprintf('Failed asserting that notice matching regex "%s" has not been logged.', $regex)
        );
    }

    /**
     * @param string $regex
     */
    public function seeLoggerHasInfoThatMatchesRegex($regex)
    {
        $this->assertTrue(
            $this->logger->hasInfoThatMatches($regex),
            sprintf('Failed asserting that info matching regex "%s" has been logged.', $regex)
        );
    }

    /**
     * @param string $regex
     */
    public function dontSeeLoggerHasInfoThatMatchesRegex($regex)
    {
        $this->assertFalse(
            $this->logger->hasInfoThatMatches($regex),
            sprintf('Failed asserting that info matching regex "%s" has not been logged.', $regex)
        );
    }

    /**
     * @param string $regex
     */
    public function seeLoggerHasDebugThatMatchesRegex($regex)
    {
        $this->assertTrue(
            $this->logger->hasDebugThatMatches($regex),
            sprintf('Failed asserting that debug matching regex "%s" has been logged.', $regex)
        );
    }

    /**
     * @param string $regex
     */
    public function dontSeeLoggerHasDebugThatMatchesRegex($regex)
    {
        $this->assertFalse(
            $this->logger->hasDebugThatMatches($regex),
            sprintf('Failed asserting that debug matching regex "%s" has not been logged.', $regex)
        );
    }

    public function seeLoggerHasEmergencyThatPasses(callable $matcher)
    {
        $this->assertTrue(
            $this->logger->hasEmergencyThatPasses($matcher),
            'Failed asserting that emergency matching callable was logged.'
        );
    }

    public function dontSeeLoggerHasEmergencyThatPasses(callable $matcher)
    {
        $this->assertFalse(
            $this->logger->hasEmergencyThatPasses($matcher),
            'Failed asserting that emergency matching callable was not logged.'
        );
    }

    public function seeLoggerHasAlertThatPasses(callable $matcher)
    {
        $this->assertTrue(
            $this->logger->hasAlertThatPasses($matcher),
            'Failed asserting that alert matching callable was logged.'
        );
    }

    public function dontSeeLoggerHasAlertThatPasses(callable $matcher)
    {
        $this->assertFalse(
            $this->logger->hasAlertThatPasses($matcher),
            'Failed asserting that alert matching callable was not logged.'
        );
    }

    public function seeLoggerHasCriticalThatPasses(callable $matcher)
    {
        $this->assertTrue(
            $this->logger->hasCriticalThatPasses($matcher),
            'Failed asserting that critical matching callable was logged.'
        );
    }

    public function dontSeeLoggerHasCriticalThatPasses(callable $matcher)
    {
        $this->assertFalse(
            $this->logger->hasCriticalThatPasses($matcher),
            'Failed asserting that critical matching callable was not logged.'
        );
    }

    public function seeLoggerHasErrorThatPasses(callable $matcher)
    {
        $this->assertTrue(
            $this->logger->hasErrorThatPasses($matcher),
            'Failed asserting that error matching callable was logged.'
        );
    }

    public function dontSeeLoggerHasErrorThatPasses(callable $matcher)
    {
        $this->assertFalse(
            $this->logger->hasErrorThatPasses($matcher),
            'Failed asserting that error matching callable was not logged.'
        );
    }

    public function seeLoggerHasWarningThatPasses(callable $matcher)
    {
        $this->assertTrue(
            $this->logger->hasWarningThatPasses($matcher),
            'Failed asserting that warning matching callable was logged.'
        );
    }

    public function dontSeeLoggerHasWarningThatPasses(callable $matcher)
    {
        $this->assertFalse(
            $this->logger->hasWarningThatPasses($matcher),
            'Failed asserting that warning matching callable was not logged.'
        );
    }

    public function seeLoggerHasNoticeThatPasses(callable $matcher)
    {
        $this->assertTrue(
            $this->logger->hasNoticeThatPasses($matcher),
            'Failed asserting that notice matching callable was logged.'
        );
    }

    public function dontSeeLoggerHasNoticeThatPasses(callable $matcher)
    {
        $this->assertFalse(
            $this->logger->hasNoticeThatPasses($matcher),
            'Failed asserting that notice matching callable was not logged.'
        );
    }

    public function seeLoggerHasInfoThatPasses(callable $matcher)
    {
        $this->assertTrue(
            $this->logger->hasInfoThatPasses($matcher),
            'Failed asserting that info matching callable was logged.'
        );
    }

    public function dontSeeLoggerHasInfoThatPasses(callable $matcher)
    {
        $this->assertFalse(
            $this->logger->hasInfoThatPasses($matcher),
            'Failed asserting that info matching callable was not logged.'
        );
    }

    public function seeLoggerHasDebugThatPasses(callable $matcher)
    {
        $this->assertTrue(
            $this->logger->hasDebugThatPasses($matcher),
            'Failed asserting that debug matching callable was logged.'
        );
    }

    public function dontSeeLoggerHasDebugThatPasses(callable $matcher)
    {
        $this->assertFalse(
            $this->logger->hasDebugThatPasses($matcher),
            'Failed asserting that debug matching callable was not logged.'
        );
    }

    /**
     * @param string $method
     * @param string $message
     * @param array|null $context
     *
     * @return bool
     */
    protected function isRecordLogged($method, $message, array $context = null)
    {
        $record = ['message' => $message];

        if ($context !== null) {
            $record['context'] = $context;
        }

        return $this->logger->$method($record);
    }
}
