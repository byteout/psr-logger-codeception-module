# Codeception PSR3 Logger Module

This library provides [Codeception](https://github.com/Codeception/Codeception) module for testing [PSR3](https://www.php-fig.org/psr/psr-3/) compatible
loggers.

## Installation

1. Install and configure [Codeception](https://codeception.com/install)

1. Install module using composer
    ```bash
    composer require "byteout/psr-logger-codeception-module" --dev
    ```

1. Enable the module in your suite `{NAME}.suite.yml`:
    ```yaml
    modules:
        enabled:
            - Byteout\Codeception\Module\PsrLogger
    ```

## Examples

1. Simple usage
    ```php
    <?php
        
    $logger = $I->grabLogger();
    $logger->notice('This is logger example.');
    
    $I->seeLoggerHasNotice('This is logger example.');
    ```

1. Track logs from other services
    ```php
    <?php
    
    use Psr\Log\LoggerInterface;
    
    class HelloWorld
    {
        private $logger;
    
        public function __construct(LoggerInterface $logger)
        {
            $this->logger = $logger;
        }
    
        public function sayHello($name)
        {
            $this->logger->info("Hello $name");
        }
    }
    
    $logger = $I->grabLogger();
    $service = new HelloWorld($logger);
    
    $service->sayHello('John');
    
    $I->seeLoggerHasInfo('Hello John');
    ```

1. Simulate logs
    ```php
    <?php
    
    $I->haveWarning('Something bad happened', ['problem' => 'This is more info.']);
    
    $I->dontSeeLoggerHasAnyError();
    $I->seeLoggerHasAnyWarning();
    $I->seeLoggerHasWarningThatContains('bad');
    ```
