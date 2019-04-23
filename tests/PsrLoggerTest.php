<?php

namespace Tests\Byteout\Codeception\Module;

use Byteout\Codeception\Module\PsrLogger;
use Codeception\Lib\ModuleContainer;
use Codeception\TestInterface;
use PHPUnit\Framework\TestCase;

class PsrLoggerTest extends TestCase
{
    /** @var PsrLogger */
    private $module;

    protected function setUp()
    {
        $container = $this->createMock(ModuleContainer::class);
        $this->module = new PsrLogger($container);
        $this->module->_before($this->createMock(TestInterface::class));
    }

    public function testModuleName()
    {
        $name = $this->module->_getName();
        $this->assertEquals('\\Byteout\\Codeception\\Module\\PsrLogger', $name);
    }

    public function testEmergency()
    {
        $this->module->dontSeeLoggerHasAnyEmergency();

        $this->module->haveEmergency('Test message 1', ['test' => 'Test context']);

        $this->module->seeLoggerHasAnyEmergency();

        $this->module->seeLoggerHasEmergency('Test message 1');
        $this->module->seeLoggerHasEmergency('Test message 1', ['test' => 'Test context']);

        $this->module->dontSeeLoggerHasEmergency('Wrong message');
        $this->module->dontSeeLoggerHasEmergency('Test message 1', ['test' => 'wrong context']);

        $this->module->haveEmergency('Test message 2');

        $this->module->seeLoggerHasEmergency('Test message 1');
        $this->module->seeLoggerHasEmergency('Test message 2');

        $this->module->seeLoggerHasEmergencyThatContains('message');
        $this->module->dontSeeLoggerHasEmergencyThatContains('wrong');

        $this->module->seeLoggerHasEmergencyThatMatchesRegex('/message/');
        $this->module->dontSeeLoggerHasEmergencyThatMatchesRegex('/wrong/');

        $this->module->seeLoggerHasEmergencyThatPasses(function ($record) {
            return isset($record['context']['test']);
        });
        $this->module->dontSeeLoggerHasEmergencyThatPasses(function ($record) {
            return isset($record['context']['wrong']);
        });
    }

    public function testAlert()
    {
        $this->module->dontSeeLoggerHasAnyAlert();

        $this->module->haveAlert('Test message 1', ['test' => 'Test context']);

        $this->module->seeLoggerHasAnyAlert();

        $this->module->seeLoggerHasAlert('Test message 1');
        $this->module->seeLoggerHasAlert('Test message 1', ['test' => 'Test context']);

        $this->module->dontSeeLoggerHasAlert('Wrong message');
        $this->module->dontSeeLoggerHasAlert('Test message 1', ['test' => 'wrong context']);

        $this->module->haveAlert('Test message 2');

        $this->module->seeLoggerHasAlert('Test message 1');
        $this->module->seeLoggerHasAlert('Test message 2');

        $this->module->seeLoggerHasAlertThatContains('message');
        $this->module->dontSeeLoggerHasAlertThatContains('wrong');

        $this->module->seeLoggerHasAlertThatMatchesRegex('/message/');
        $this->module->dontSeeLoggerHasAlertThatMatchesRegex('/wrong/');

        $this->module->seeLoggerHasAlertThatPasses(function ($record) {
            return isset($record['context']['test']);
        });
        $this->module->dontSeeLoggerHasAlertThatPasses(function ($record) {
            return isset($record['context']['wrong']);
        });
    }

    public function testCritical()
    {
        $this->module->dontSeeLoggerHasAnyCritical();

        $this->module->haveCritical('Test message 1', ['test' => 'Test context']);

        $this->module->seeLoggerHasAnyCritical();

        $this->module->seeLoggerHasCritical('Test message 1');
        $this->module->seeLoggerHasCritical('Test message 1', ['test' => 'Test context']);

        $this->module->dontSeeLoggerHasCritical('Wrong message');
        $this->module->dontSeeLoggerHasCritical('Test message 1', ['test' => 'wrong context']);

        $this->module->haveCritical('Test message 2');

        $this->module->seeLoggerHasCritical('Test message 1');
        $this->module->seeLoggerHasCritical('Test message 2');

        $this->module->seeLoggerHasCriticalThatContains('message');
        $this->module->dontSeeLoggerHasCriticalThatContains('wrong');

        $this->module->seeLoggerHasCriticalThatMatchesRegex('/message/');
        $this->module->dontSeeLoggerHasCriticalThatMatchesRegex('/wrong/');

        $this->module->seeLoggerHasCriticalThatPasses(function ($record) {
            return isset($record['context']['test']);
        });
        $this->module->dontSeeLoggerHasCriticalThatPasses(function ($record) {
            return isset($record['context']['wrong']);
        });
    }

    public function testError()
    {
        $this->module->dontSeeLoggerHasAnyError();

        $this->module->haveError('Test message 1', ['test' => 'Test context']);

        $this->module->seeLoggerHasAnyError();

        $this->module->seeLoggerHasError('Test message 1');
        $this->module->seeLoggerHasError('Test message 1', ['test' => 'Test context']);

        $this->module->dontSeeLoggerHasError('Wrong message');
        $this->module->dontSeeLoggerHasError('Test message 1', ['test' => 'wrong context']);

        $this->module->haveError('Test message 2');

        $this->module->seeLoggerHasError('Test message 1');
        $this->module->seeLoggerHasError('Test message 2');

        $this->module->seeLoggerHasErrorThatContains('message');
        $this->module->dontSeeLoggerHasErrorThatContains('wrong');

        $this->module->seeLoggerHasErrorThatMatchesRegex('/message/');
        $this->module->dontSeeLoggerHasErrorThatMatchesRegex('/wrong/');

        $this->module->seeLoggerHasErrorThatPasses(function ($record) {
            return isset($record['context']['test']);
        });
        $this->module->dontSeeLoggerHasErrorThatPasses(function ($record) {
            return isset($record['context']['wrong']);
        });
    }

    public function testWarning()
    {
        $this->module->dontSeeLoggerHasAnyWarning();

        $this->module->haveWarning('Test message 1', ['test' => 'Test context']);

        $this->module->seeLoggerHasAnyWarning();

        $this->module->seeLoggerHasWarning('Test message 1');
        $this->module->seeLoggerHasWarning('Test message 1', ['test' => 'Test context']);

        $this->module->dontSeeLoggerHasWarning('Wrong message');
        $this->module->dontSeeLoggerHasWarning('Test message 1', ['test' => 'wrong context']);

        $this->module->haveWarning('Test message 2');

        $this->module->seeLoggerHasWarning('Test message 1');
        $this->module->seeLoggerHasWarning('Test message 2');

        $this->module->seeLoggerHasWarningThatContains('message');
        $this->module->dontSeeLoggerHasWarningThatContains('wrong');

        $this->module->seeLoggerHasWarningThatMatchesRegex('/message/');
        $this->module->dontSeeLoggerHasWarningThatMatchesRegex('/wrong/');

        $this->module->seeLoggerHasWarningThatPasses(function ($record) {
            return isset($record['context']['test']);
        });
        $this->module->dontSeeLoggerHasWarningThatPasses(function ($record) {
            return isset($record['context']['wrong']);
        });
    }

    public function testNotice()
    {
        $this->module->dontSeeLoggerHasAnyNotice();

        $this->module->haveNotice('Test message 1', ['test' => 'Test context']);

        $this->module->seeLoggerHasAnyNotice();

        $this->module->seeLoggerHasNotice('Test message 1');
        $this->module->seeLoggerHasNotice('Test message 1', ['test' => 'Test context']);

        $this->module->dontSeeLoggerHasNotice('Wrong message');
        $this->module->dontSeeLoggerHasNotice('Test message 1', ['test' => 'wrong context']);

        $this->module->haveNotice('Test message 2');

        $this->module->seeLoggerHasNotice('Test message 1');
        $this->module->seeLoggerHasNotice('Test message 2');

        $this->module->seeLoggerHasNoticeThatContains('message');
        $this->module->dontSeeLoggerHasNoticeThatContains('wrong');

        $this->module->seeLoggerHasNoticeThatMatchesRegex('/message/');
        $this->module->dontSeeLoggerHasNoticeThatMatchesRegex('/wrong/');

        $this->module->seeLoggerHasNoticeThatPasses(function ($record) {
            return isset($record['context']['test']);
        });
        $this->module->dontSeeLoggerHasNoticeThatPasses(function ($record) {
            return isset($record['context']['wrong']);
        });
    }

    public function testInfo()
    {
        $this->module->dontSeeLoggerHasAnyInfo();

        $this->module->haveInfo('Test message 1', ['test' => 'Test context']);

        $this->module->seeLoggerHasAnyInfo();

        $this->module->seeLoggerHasInfo('Test message 1');
        $this->module->seeLoggerHasInfo('Test message 1', ['test' => 'Test context']);

        $this->module->dontSeeLoggerHasInfo('Wrong message');
        $this->module->dontSeeLoggerHasInfo('Test message 1', ['test' => 'wrong context']);

        $this->module->haveInfo('Test message 2');

        $this->module->seeLoggerHasInfo('Test message 1');
        $this->module->seeLoggerHasInfo('Test message 2');

        $this->module->seeLoggerHasInfoThatContains('message');
        $this->module->dontSeeLoggerHasInfoThatContains('wrong');

        $this->module->seeLoggerHasInfoThatMatchesRegex('/message/');
        $this->module->dontSeeLoggerHasInfoThatMatchesRegex('/wrong/');

        $this->module->seeLoggerHasInfoThatPasses(function ($record) {
            return isset($record['context']['test']);
        });
        $this->module->dontSeeLoggerHasInfoThatPasses(function ($record) {
            return isset($record['context']['wrong']);
        });
    }

    public function testDebug()
    {
        $this->module->dontSeeLoggerHasAnyDebug();

        $this->module->haveDebug('Test message 1', ['test' => 'Test context']);

        $this->module->seeLoggerHasAnyDebug();

        $this->module->seeLoggerHasDebug('Test message 1');
        $this->module->seeLoggerHasDebug('Test message 1', ['test' => 'Test context']);

        $this->module->dontSeeLoggerHasDebug('Wrong message');
        $this->module->dontSeeLoggerHasDebug('Test message 1', ['test' => 'wrong context']);

        $this->module->haveDebug('Test message 2');

        $this->module->seeLoggerHasDebug('Test message 1');
        $this->module->seeLoggerHasDebug('Test message 2');

        $this->module->seeLoggerHasDebugThatContains('message');
        $this->module->dontSeeLoggerHasDebugThatContains('wrong');

        $this->module->seeLoggerHasDebugThatMatchesRegex('/message/');
        $this->module->dontSeeLoggerHasDebugThatMatchesRegex('/wrong/');

        $this->module->seeLoggerHasDebugThatPasses(function ($record) {
            return isset($record['context']['test']);
        });
        $this->module->dontSeeLoggerHasDebugThatPasses(function ($record) {
            return isset($record['context']['wrong']);
        });
    }
}
