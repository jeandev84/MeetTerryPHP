<?php
declare(strict_types=1);

namespace Framework\Component\Logger;

use Framework\Contract\Psr3\Logger\LoggerInterface;
use Framework\Exception\InvalidLogLevelArgument;
use Framework\Foundation\App;
use ReflectionClass;

/**
 * Logger
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  Framework\Component\Logger
 */
class Logger implements LoggerInterface
{

     public function __construct(protected App $app)
     {
     }

    /**
     * @inheritDoc
     */
    public function emergency($message, array $context = [])
    {
        $this->addRecord(LogLevel::EMERGENCY, $message, $context);
    }

    /**
     * @inheritDoc
     */
    public function alert($message, array $context = [])
    {
        $this->addRecord(LogLevel::ALERT, $message, $context);
    }

    /**
     * @inheritDoc
     */
    public function critical($message, array $context = [])
    {
        $this->addRecord(LogLevel::CRITICAL, $message, $context);
    }

    /**
     * @inheritDoc
     */
    public function error($message, array $context = [])
    {
        $this->addRecord(LogLevel::ERROR, $message, $context);
    }

    /**
     * @inheritDoc
     */
    public function warning($message, array $context = [])
    {
        $this->addRecord(LogLevel::WARNING, $message, $context);
    }

    /**
     * @inheritDoc
     */
    public function notice($message, array $context = [])
    {
        $this->addRecord(LogLevel::NOTICE, $message, $context);
    }

    /**
     * @inheritDoc
     */
    public function info($message, array $context = [])
    {
        $this->addRecord(LogLevel::INFO, $message, $context);
    }

    /**
     * @inheritDoc
     */
    public function debug($message, array $context = [])
    {
        $this->addRecord(LogLevel::DEBUG, $message, $context);
    }

    /**
     * @inheritDoc
     */
    public function log($level, $message, array $context = [])
    {
        $object = new ReflectionClass(LogLevel::class);
        $validLogLevelsArray = $object->getConstants();
        if(!in_array($level, $validLogLevelsArray)){
            throw new InvalidLogLevelArgument($level, $validLogLevelsArray);
        }
        $this->addRecord($level, $message, $context);
    }



    private function addRecord(string $level, string $message, array $context = [])
    {
        $date = $this->app->getServerTime()->format('Y-m-d H:i:s');
        $logPath = $this->app->getLogPath();
        $env = $this->app->getEnvironment();
        $details = sprintf(
                "%s - Level: %s - Message: %s - Context: %s", $date, $level, $message, json_encode($context)
            ).PHP_EOL;

        $fileName = sprintf("%s/%s-%s.log", $logPath, $env, date("j.n.Y"));
        file_put_contents($fileName, $details, FILE_APPEND);
    }
}