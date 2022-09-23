# Codeception PSR3 Logger Module

[![Packagist Version](https://img.shields.io/packagist/v/byteout/psr-logger-codeception-module.svg)](https://packagist.org/packages/byteout/psr-logger-codeception-module)
[![License](https://img.shields.io/github/license/byteout/psr-logger-codeception-module.svg)](LICENSE)

[Codeception](https://github.com/Codeception/Codeception) module for validation of messages logged by
[PSR3](https://www.php-fig.org/psr/psr-3/) loggers.

Developed by [Byteout Software](https://www.byteout.com/).

## Compatibility

| PHP                           | codeception                           | psr/log                     | Module Version                                          |
|-------------------------------|---------------------------------------|-----------------------------|---------------------------------------------------------|
| <code>=5.6.0&nbsp;<9.0</code> | <code>^2.2&#124;^3.0&#124;^4.0</code> | <code>^1.0</code>           | <code>byteout/psr-logger-codeception-module:^1.0</code> |
| <code>^8.0</code>             | <code>^4.1.9</code>                   | <code>^2.0&#124;^3.0</code> | <code>byteout/psr-logger-codeception-module:^2.0</code> |

## Installation

1. Install and configure [Codeception](https://codeception.com/install)

2. Install module using composer
    ```bash
    composer require "byteout/psr-logger-codeception-module" --dev
    ```

3. Enable the module in your suite `{NAME}.suite.yml`:
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

2. Track logs from other services
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

3. Simulate logs
    ```php
    <?php
    
    $I->haveWarning('Something bad happened', ['problem' => 'This is more info.']);
    
    $I->dontSeeLoggerHasAnyError();
    $I->seeLoggerHasAnyWarning();
    $I->seeLoggerHasWarningThatContains('bad');
    ```

## Actions

### Get logger instance

```php
public function grabLogger(): \Psr\Log\LoggerInterface;
```

### Log message

```php
public function haveEmergency(string $message, array $context = []);
public function haveAlert(string $message, array $context = []);
public function haveCritical(string $message, array $context = []);
public function haveError(string $message, array $context = []);
public function haveWarning(string $message, array $context = []);
public function haveNotice(string $message, array $context = []);
public function haveInfo(string $message, array $context = []);
public function haveDebug(string $message, array $context = []);
```

**Example:**
```php
$I->haveEmergency('This is emergency');
$I->haveEmergency('This is emergency with context', ['error' => 'This is context array']);
```

### Check if specific message was logged

When `context` is null only message is matched, and context is ignored. When `context` is array it will
be fully matched, along with the message.
```php
public function seeLoggerHasEmergency(string $message, array $context = null);
public function seeLoggerHasAlert(string $message, array $context = null);
public function seeLoggerHasCritical(string $message, array $context = null);
public function seeLoggerHasError(string $message, array $context = null);
public function seeLoggerHasWarning(string $message, array $context = null);
public function seeLoggerHasNotice(string $message, array $context = null);
public function seeLoggerHasInfo(string $message, array $context = null);
public function seeLoggerHasDebug(string $message, array $context = null);
```

**Example**
```php
// matches all 'This is emergency' emergency messages, despite the context
$I->seeLoggerHasEmergency('This is emergency');

// matches only message with the given context
$I->seeLoggerHasEmergency('This is emergency with context', ['error' => 'This is context array']);
```

### Check if specific message was not logged

When `context` is null only message is matched, and context is ignored. When `context` is array it will
be fully matched, along with the message.
```php
public function dontSeeLoggerHasEmergency(string $message, array $context = null);
public function dontSeeLoggerHasAlert(string $message, array $context = null);
public function dontSeeLoggerHasCritical(string $message, array $context = null);
public function dontSeeLoggerHasError(string $message, array $context = null);
public function dontSeeLoggerHasWarning(string $message, array $context = null);
public function dontSeeLoggerHasNotice(string $message, array $context = null);
public function dontSeeLoggerHasInfo(string $message, array $context = null);
public function dontSeeLoggerHasDebug(string $message, array $context = null);
```

**Example**
```php
// fails if any 'This is emergency' emergency message was logged, despite the context
$I->dontSeeLoggerHasEmergency('This is emergency');

// fails only when a message with the given content and context was logged
$I->dontSeeLoggerHasEmergency('This is emergency with context', ['error' => 'This is context array']);
```

### Check if any message was logged

```php
public function seeLoggerHasAnyEmergency();
public function seeLoggerHasAnyAlert();
public function seeLoggerHasAnyCritical();
public function seeLoggerHasAnyError();
public function seeLoggerHasAnyWarning();
public function seeLoggerHasAnyNotice();
public function seeLoggerHasAnyInfo();
public function seeLoggerHasAnyDebug();
```

### Check if no message was logged

```php
public function dontSeeLoggerHasAnyEmergency();
public function dontSeeLoggerHasAnyAlert();
public function dontSeeLoggerHasAnyCritical();
public function dontSeeLoggerHasAnyError();
public function dontSeeLoggerHasAnyWarning();
public function dontSeeLoggerHasAnyNotice();
public function dontSeeLoggerHasAnyInfo();
public function dontSeeLoggerHasAnyDebug();
```

### Check if message containing substring was logged

```php
public function seeLoggerHasEmergencyThatContains(string $message);
public function seeLoggerHasAlertThatContains(string $message);
public function seeLoggerHasCriticalThatContains(string $message);
public function seeLoggerHasErrorThatContains(string $message);
public function seeLoggerHasWarningThatContains(string $message);
public function seeLoggerHasNoticeThatContains(string $message);
public function seeLoggerHasInfoThatContains(string $message);
public function seeLoggerHasDebugThatContains(string $message);
```

**Example:**
```php
// matches all emergency messages containing 'emergency' substring
$I->seeLoggerHasEmergencyThatContains('emergency');
```

### Check if message containing substring was not logged

```php
public function dontSeeLoggerHasEmergencyThatContains(string $message);
public function dontSeeLoggerHasAlertThatContains(string $message);
public function dontSeeLoggerHasCriticalThatContains(string $message);
public function dontSeeLoggerHasErrorThatContains(string $message);
public function dontSeeLoggerHasWarningThatContains(string $message);
public function dontSeeLoggerHasNoticeThatContains(string $message);
public function dontSeeLoggerHasInfoThatContains(string $message);
public function dontSeeLoggerHasDebugThatContains(string $message);
```

**Example:**
```php
// fails is any emergency message containing 'emergency' substring was logged
$I->dontSeeLoggerHasEmergencyThatContains('emergency');
```

### Check if message matching regular expression was logged

```php
public function seeLoggerHasEmergencyThatMatchesRegex(string $regex);
public function seeLoggerHasAlertThatMatchesRegex(string $regex);
public function seeLoggerHasCriticalThatMatchesRegex(string $regex);
public function seeLoggerHasErrorThatMatchesRegex(string $regex);
public function seeLoggerHasWarningThatMatchesRegex(string $regex);
public function seeLoggerHasNoticeThatMatchesRegex(string $regex);
public function seeLoggerHasInfoThatMatchesRegex(string $regex);
public function seeLoggerHasDebugThatMatchesRegex(string $regex);
```

**Example:**
```php
// matches all emergency messages passing regex '/emergency/i'
$I->seeLoggerHasEmergencyThatMatchesRegex('/emergency/i');
```

### Check if message matching regular expression was not logged

```php
public function dontSeeLoggerHasEmergencyThatMatchesRegex(string $regex);
public function dontSeeLoggerHasAlertThatMatchesRegex(string $regex);
public function dontSeeLoggerHasCriticalThatMatchesRegex(string $regex);
public function dontSeeLoggerHasErrorThatMatchesRegex(string $regex);
public function dontSeeLoggerHasWarningThatMatchesRegex(string $regex);
public function dontSeeLoggerHasNoticeThatMatchesRegex(string $regex);
public function dontSeeLoggerHasInfoThatMatchesRegex(string $regex);
public function dontSeeLoggerHasDebugThatMatchesRegex(string $regex);
```

**Example:**
```php
// fails is any emergency message passing regex '/emergency/i was logged
$I->dontSeeLoggerHasEmergencyThatMatchesRegex('emergency');
```

### Check if message was logged using callback

```php
public function seeLoggerHasEmergencyThatPasses(callable $matcher);
public function seeLoggerHasAlertThatPasses(callable $matcher);
public function seeLoggerHasCriticalThatPasses(callable $matcher);
public function seeLoggerHasErrorThatPasses(callable $matcher);
public function seeLoggerHasWarningThatPasses(callable $matcher);
public function seeLoggerHasNoticeThatPasses(callable $matcher);
public function seeLoggerHasInfoThatPasses(callable $matcher);
public function seeLoggerHasDebugThatPasses(callable $matcher);
```

**Example:**
```php
$I->seeLoggerHasEmergencyThatPasses(function ($record) {
    return $record['message'] === 'Test message' && $record['context']['error'] = 'Test error';
});
```

### Check if message was not logged using callback

```php
public function dontSeeLoggerHasEmergencyThatPasses(callable $matcher);
public function dontSeeLoggerHasAlertThatPasses(callable $matcher);
public function dontSeeLoggerHasCriticalThatPasses(callable $matcher);
public function dontSeeLoggerHasErrorThatPasses(callable $matcher);
public function dontSeeLoggerHasWarningThatPasses(callable $matcher);
public function dontSeeLoggerHasNoticeThatPasses(callable $matcher);
public function dontSeeLoggerHasInfoThatPasses(callable $matcher);
public function dontSeeLoggerHasDebugThatPasses(callable $matcher);
```

**Example:**
```php
$I->dontSeeLoggerHasEmergencyThatPasses(function ($record) {
    return $record['message'] === 'Test message' && $record['context']['error'] = 'Test error';
});
```
