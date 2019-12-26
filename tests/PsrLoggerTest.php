<?php

namespace Tests\Byteout\Codeception\Module;

use Byteout\Codeception\Module\PsrLogger;
use Codeception\Lib\ModuleContainer;
use Codeception\TestInterface;
use PHPUnit\Framework\TestCase;

class PsrLoggerTest extends TestCase
{
    /**
     * @return PsrLogger
     */
    private function createModule()
    {
        $container = $this->createMock(ModuleContainer::class);
        $module = new PsrLogger($container);
        $module->_before($this->createMock(TestInterface::class));

        return $module;
    }

    public function testModuleName()
    {
        $module = $this->createModule();
        $name = $module->_getName();
        $this->assertEquals('\\Byteout\\Codeception\\Module\\PsrLogger', $name);
    }

    public function testEmergency()
    {
        $module = $this->createModule();

        $module->dontSeeLoggerHasAnyEmergency();

        $module->haveEmergency('Test message 1', ['test' => 'Test context']);

        $module->seeLoggerHasAnyEmergency();

        $module->seeLoggerHasEmergency('Test message 1');
        $module->seeLoggerHasEmergency('Test message 1', ['test' => 'Test context']);

        $module->dontSeeLoggerHasEmergency('Wrong message');
        $module->dontSeeLoggerHasEmergency('Test message 1', ['test' => 'wrong context']);

        $module->haveEmergency('Test message 2');

        $module->seeLoggerHasEmergency('Test message 1');
        $module->seeLoggerHasEmergency('Test message 2');

        $module->seeLoggerHasEmergencyThatContains('message');
        $module->dontSeeLoggerHasEmergencyThatContains('wrong');

        $module->seeLoggerHasEmergencyThatMatchesRegex('/message/');
        $module->dontSeeLoggerHasEmergencyThatMatchesRegex('/wrong/');

        $module->seeLoggerHasEmergencyThatPasses(static function ($record) {
            return isset($record['context']['test']);
        });
        $module->dontSeeLoggerHasEmergencyThatPasses(static function ($record) {
            return isset($record['context']['wrong']);
        });
    }

    public function testAlert()
    {
        $module = $this->createModule();

        $module->dontSeeLoggerHasAnyAlert();

        $module->haveAlert('Test message 1', ['test' => 'Test context']);

        $module->seeLoggerHasAnyAlert();

        $module->seeLoggerHasAlert('Test message 1');
        $module->seeLoggerHasAlert('Test message 1', ['test' => 'Test context']);

        $module->dontSeeLoggerHasAlert('Wrong message');
        $module->dontSeeLoggerHasAlert('Test message 1', ['test' => 'wrong context']);

        $module->haveAlert('Test message 2');

        $module->seeLoggerHasAlert('Test message 1');
        $module->seeLoggerHasAlert('Test message 2');

        $module->seeLoggerHasAlertThatContains('message');
        $module->dontSeeLoggerHasAlertThatContains('wrong');

        $module->seeLoggerHasAlertThatMatchesRegex('/message/');
        $module->dontSeeLoggerHasAlertThatMatchesRegex('/wrong/');

        $module->seeLoggerHasAlertThatPasses(static function ($record) {
            return isset($record['context']['test']);
        });
        $module->dontSeeLoggerHasAlertThatPasses(static function ($record) {
            return isset($record['context']['wrong']);
        });
    }

    public function testCritical()
    {
        $module = $this->createModule();

        $module->dontSeeLoggerHasAnyCritical();

        $module->haveCritical('Test message 1', ['test' => 'Test context']);

        $module->seeLoggerHasAnyCritical();

        $module->seeLoggerHasCritical('Test message 1');
        $module->seeLoggerHasCritical('Test message 1', ['test' => 'Test context']);

        $module->dontSeeLoggerHasCritical('Wrong message');
        $module->dontSeeLoggerHasCritical('Test message 1', ['test' => 'wrong context']);

        $module->haveCritical('Test message 2');

        $module->seeLoggerHasCritical('Test message 1');
        $module->seeLoggerHasCritical('Test message 2');

        $module->seeLoggerHasCriticalThatContains('message');
        $module->dontSeeLoggerHasCriticalThatContains('wrong');

        $module->seeLoggerHasCriticalThatMatchesRegex('/message/');
        $module->dontSeeLoggerHasCriticalThatMatchesRegex('/wrong/');

        $module->seeLoggerHasCriticalThatPasses(static function ($record) {
            return isset($record['context']['test']);
        });
        $module->dontSeeLoggerHasCriticalThatPasses(static function ($record) {
            return isset($record['context']['wrong']);
        });
    }

    public function testError()
    {
        $module = $this->createModule();

        $module->dontSeeLoggerHasAnyError();

        $module->haveError('Test message 1', ['test' => 'Test context']);

        $module->seeLoggerHasAnyError();

        $module->seeLoggerHasError('Test message 1');
        $module->seeLoggerHasError('Test message 1', ['test' => 'Test context']);

        $module->dontSeeLoggerHasError('Wrong message');
        $module->dontSeeLoggerHasError('Test message 1', ['test' => 'wrong context']);

        $module->haveError('Test message 2');

        $module->seeLoggerHasError('Test message 1');
        $module->seeLoggerHasError('Test message 2');

        $module->seeLoggerHasErrorThatContains('message');
        $module->dontSeeLoggerHasErrorThatContains('wrong');

        $module->seeLoggerHasErrorThatMatchesRegex('/message/');
        $module->dontSeeLoggerHasErrorThatMatchesRegex('/wrong/');

        $module->seeLoggerHasErrorThatPasses(static function ($record) {
            return isset($record['context']['test']);
        });
        $module->dontSeeLoggerHasErrorThatPasses(static function ($record) {
            return isset($record['context']['wrong']);
        });
    }

    public function testWarning()
    {
        $module = $this->createModule();

        $module->dontSeeLoggerHasAnyWarning();

        $module->haveWarning('Test message 1', ['test' => 'Test context']);

        $module->seeLoggerHasAnyWarning();

        $module->seeLoggerHasWarning('Test message 1');
        $module->seeLoggerHasWarning('Test message 1', ['test' => 'Test context']);

        $module->dontSeeLoggerHasWarning('Wrong message');
        $module->dontSeeLoggerHasWarning('Test message 1', ['test' => 'wrong context']);

        $module->haveWarning('Test message 2');

        $module->seeLoggerHasWarning('Test message 1');
        $module->seeLoggerHasWarning('Test message 2');

        $module->seeLoggerHasWarningThatContains('message');
        $module->dontSeeLoggerHasWarningThatContains('wrong');

        $module->seeLoggerHasWarningThatMatchesRegex('/message/');
        $module->dontSeeLoggerHasWarningThatMatchesRegex('/wrong/');

        $module->seeLoggerHasWarningThatPasses(static function ($record) {
            return isset($record['context']['test']);
        });
        $module->dontSeeLoggerHasWarningThatPasses(static function ($record) {
            return isset($record['context']['wrong']);
        });
    }

    public function testNotice()
    {
        $module = $this->createModule();

        $module->dontSeeLoggerHasAnyNotice();

        $module->haveNotice('Test message 1', ['test' => 'Test context']);

        $module->seeLoggerHasAnyNotice();

        $module->seeLoggerHasNotice('Test message 1');
        $module->seeLoggerHasNotice('Test message 1', ['test' => 'Test context']);

        $module->dontSeeLoggerHasNotice('Wrong message');
        $module->dontSeeLoggerHasNotice('Test message 1', ['test' => 'wrong context']);

        $module->haveNotice('Test message 2');

        $module->seeLoggerHasNotice('Test message 1');
        $module->seeLoggerHasNotice('Test message 2');

        $module->seeLoggerHasNoticeThatContains('message');
        $module->dontSeeLoggerHasNoticeThatContains('wrong');

        $module->seeLoggerHasNoticeThatMatchesRegex('/message/');
        $module->dontSeeLoggerHasNoticeThatMatchesRegex('/wrong/');

        $module->seeLoggerHasNoticeThatPasses(static function ($record) {
            return isset($record['context']['test']);
        });
        $module->dontSeeLoggerHasNoticeThatPasses(static function ($record) {
            return isset($record['context']['wrong']);
        });
    }

    public function testInfo()
    {
        $module = $this->createModule();

        $module->dontSeeLoggerHasAnyInfo();

        $module->haveInfo('Test message 1', ['test' => 'Test context']);

        $module->seeLoggerHasAnyInfo();

        $module->seeLoggerHasInfo('Test message 1');
        $module->seeLoggerHasInfo('Test message 1', ['test' => 'Test context']);

        $module->dontSeeLoggerHasInfo('Wrong message');
        $module->dontSeeLoggerHasInfo('Test message 1', ['test' => 'wrong context']);

        $module->haveInfo('Test message 2');

        $module->seeLoggerHasInfo('Test message 1');
        $module->seeLoggerHasInfo('Test message 2');

        $module->seeLoggerHasInfoThatContains('message');
        $module->dontSeeLoggerHasInfoThatContains('wrong');

        $module->seeLoggerHasInfoThatMatchesRegex('/message/');
        $module->dontSeeLoggerHasInfoThatMatchesRegex('/wrong/');

        $module->seeLoggerHasInfoThatPasses(static function ($record) {
            return isset($record['context']['test']);
        });
        $module->dontSeeLoggerHasInfoThatPasses(static function ($record) {
            return isset($record['context']['wrong']);
        });
    }

    public function testDebug()
    {
        $module = $this->createModule();

        $module->dontSeeLoggerHasAnyDebug();

        $module->haveDebug('Test message 1', ['test' => 'Test context']);

        $module->seeLoggerHasAnyDebug();

        $module->seeLoggerHasDebug('Test message 1');
        $module->seeLoggerHasDebug('Test message 1', ['test' => 'Test context']);

        $module->dontSeeLoggerHasDebug('Wrong message');
        $module->dontSeeLoggerHasDebug('Test message 1', ['test' => 'wrong context']);

        $module->haveDebug('Test message 2');

        $module->seeLoggerHasDebug('Test message 1');
        $module->seeLoggerHasDebug('Test message 2');

        $module->seeLoggerHasDebugThatContains('message');
        $module->dontSeeLoggerHasDebugThatContains('wrong');

        $module->seeLoggerHasDebugThatMatchesRegex('/message/');
        $module->dontSeeLoggerHasDebugThatMatchesRegex('/wrong/');

        $module->seeLoggerHasDebugThatPasses(static function ($record) {
            return isset($record['context']['test']);
        });
        $module->dontSeeLoggerHasDebugThatPasses(static function ($record) {
            return isset($record['context']['wrong']);
        });
    }
}
