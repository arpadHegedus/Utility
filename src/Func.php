<?php
/**
 * Function utilities
 *
 * @package utility
 */

namespace Utility;

class Func
{
    /**
     * A cache of returned values
     *
     * @var array
     */
    protected static $cache = [];

    /**
     * Times a function is called
     *
     * @var array
     */
    protected static $called = [];

    /**
     * Last times functions were called
     *
     * @var array
     */
    protected static $callTimes = [];

    /**
     * Cache the return of a $function and return the value from cache in subsequent calls
     *
     * @param callable $function
     * @return void
     */
    public static function cache(callable $function)
    {
        $uuid = mt_rand();
        return function () use ($function, $uuid) {
            $arguments = func_get_args();
            $signature = static::getSignature($uuid, $function, $arguments);
            if (!isset(static::$cache[$signature])) {
                $result = call_user_func_array($function, $arguments);
                static::$cache[$signature] = $result;
            }
            return static::$cache[$signature];
        };
    }

    /**
     * Call a $function with $arguments whether it is a reference array string or an anonymus function
     *
     * @param null|callable $function
     * @param array $arguments
     * @return mixed
     */
    public static function call(? callable $function, array $arguments = [])
    {
        if (!$function) {
            return;
        }
        $isRef = is_array($function) || is_string($function);
        return $isRef ? call_user_func_array($function, $arguments) : $function(...$arguments);
    }

    /**
     * Limit a $function to be only called once
     *
     * @param callable $function
     * @param bool $unique
     * @return void
     */
    public static function once(callable $function, bool $unique = false)
    {
        return static::only($function, 1, $unique);
    }

    /**
     * Limit a $function to be only called a certain number of $times
     *
     * @param callable $function
     * @param int $times
     * @param bool $unique
     * @return void
     */
    public static function only(callable $function, int $times = 1, bool $unique = false)
    {
        $uuid = $unique ? mt_rand() : null;
        return function () use ($function, $times, $uuid) {
            $arguments = func_get_args();
            $signature = static::getSignature($uuid, $function, $arguments);
            if (static::timesCalled($signature) >= $times) {
                return;
            }
            static::incrementCalled($signature);
            return call_user_func_array($function, $arguments);
        };
    }

    /**
     * Throttle a $function so that it can only be called once in every $miliseconds
     *
     * @param callable $function
     * @param integer $miliseconds
     * @return void
     */
    public static function throttle(callable $function, int $miliseconds = 300)
    {
        $uuid = mt_rand();
        return function () use ($function, $miliseconds, $uuid) {
            $arguments = func_get_args();
            $signature = static::getSignature($uuid, $function, $arguments);
            if (static::lastCalled($signature) && static::lastCalled($signature) + $miliseconds < time()) {
                return;
            }
            static::$called[$signature] = time();
            return call_user_func_array($function, $arguments);
        };
    }

    /**
     * Increment a called number for a $signature
     *
     * @param string $signature
     * @return void
     */
    protected static function incrementCalled(string $signature) : void
    {
        static::$called[$signature] = isset(static::$called[$signature]) ? static::$called[$signature] + 1 : 1;
    }

    /**
     * Check when a $signature was called last
     *
     * @param string $signature
     * @return boolean
     */
    protected static function lastCalled(string $signature) : bool
    {
        return isset(static::$callTimes[$signature]) ? static::$callTimes[$signature] : null;
    }

    /**
     * Check how many times a $signature was called
     *
     * @param string $signature
     * @return integer
     */
    protected static function timesCalled(string $signature) : int
    {
        return isset(static::$called[$signature]) ? static::$called[$signature] : 0;
    }

    /**
     * Create a unique signature for a function call
     *
     * @param int|null $uuid
     * @param callable $function
     * @param array $arguments
     * @return string
     */
    protected static function getSignature($uuid, callable $function, array $arguments) : string
    {
        $function = var_export($function, true);
        $arguments = var_export($arguments, true);

        return md5($uuid ?? '' . '_' . $function . '_' . $arguments);
    }
}
