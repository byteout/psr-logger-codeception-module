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
        $this->module->_initialize();
        $this->module->_beforeSuite();
        $this->module->_before($this->createMock(TestInterface::class));
    }

    protected function tearDown()
    {
        $this->module->_after($this->createMock(TestInterface::class));
        $this->module->_afterSuite();
    }

    public function testEmergency()
    {
        $logger = $this->module->grabLogger();
        $logger->emergency('Test emergency 1');

        $this->module->seeLoggerHasEmergency('Test emergency 1');
    }
}
