<?php

namespace Pqe\Admin\Logging;

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Log;

/**
 *
 * @method static \Psr\Log\LoggerInterface channel(string $channel = null)
 * @method static \Psr\Log\LoggerInterface stack(array $channels, string $channel = null)
 * @method static \Illuminate\Log\Logger withContext(array $context = [])
 * @method static \Illuminate\Log\Logger withoutContext()
 * @method static void alert(string $message, array $context = [])
 * @method static void critical(string $message, array $context = [])
 * @method static void debug(string $message, array $context = [])
 * @method static void emergency(string $message, array $context = [])
 * @method static void error(string $message, array $context = [])
 * @method static void info(string $message, array $context = [])
 * @method static void log($level, string $message, array $context = [])
 * @method static void notice(string $message, array $context = [])
 * @method static void warning(string $message, array $context = [])
 * @method static void write(string $level, string $message, array $context = [])
 * @method static void listen(\Closure $callback)
 *        
 * @see \Illuminate\Log\Logger
 */
class PqeLog extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
        return 'PqeLog';
    }

    protected static function info($message) {
        $channel = $GLOBALS['logChannel'] ?? 'single';
        Log::channel($channel)->info($message);
    }

    protected static function debug($message) {
        $channel = $GLOBALS['logChannel'] ?? 'single';
        Log::channel($channel)->debug($message);
    }

    protected static function notice($message) {
        $channel = $GLOBALS['logChannel'] ?? 'single';
        Log::channel($channel)->notice($message);
    }

    protected static function warning($message) {
        $channel = $GLOBALS['logChannel'] ?? 'single';
        Log::channel($channel)->warning($message);
    }

    protected static function error($message) {
        $channel = $GLOBALS['logChannel'] ?? 'single';
        Log::channel($channel)->error($message);
    }

    protected static function critical($message) {
        $channel = $GLOBALS['logChannel'] ?? 'single';
        Log::channel($channel)->critical($message);
    }
    
    protected static function getHeader($eventId, $referenceId = null, $object = null, $action = null, $method) {
        $pos = strrpos($method, '\\');
        $method_short = substr($method, $pos + 1);
        return "[" . $eventId . "][" . $referenceId . "][" . $object . "][" . $action . "][" . $method_short . "]:";
    }
}
