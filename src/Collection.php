<?php
/**
 * Utilities for arrays and objects
 *
 * @package utility
 */

namespace Utility;

class Collection extends Misc
{
    /**
     * Get a value of a $collection by a $key of $separator notation with $default fallback
     *
     * @param array|object $collection
     * @param string $key
     * @param mixed $default
     * @param string $separator
     * @return mixed
     */
    public static function get($collection, string $key = '', $default = null, string $separator = '.')
    {
        if (empty($key)) {
            return $collection;
        }
        $collection = (array) $collection;
        if (isset($collection[$key])) {
            return $collection[$key];
        }
        foreach (explode($separator, $key) as $segment) {
            $collection = (array) $collection;
            if (!isset($collection[$segment])) {
                return is_callable($default) ? $default() : $default;
            }
            $collection = $collection[$segment];
        }
        return $collection;
    }

    /**
     * Group values from a $collection according to the results of a $callback
     *
     * @param array|object $collection
     * @param callable $callback
     * @return array
     */
    public static function group($collection, callable $callback) : array
    {
        $collection = (array) $collection;
        $results = [];
        foreach ($collection as $key => $value) {
            $result = $callback($value, $key);
            if (is_bool($result)) {
                $result = (int) $result;
            }
            $results[$result][] = $value;
        }
        return $results;
    }

    /**
     * Get keys from a $collection
     *
     * @param array|object $collection
     * @return array
     */
    public static function keys($collection) : array
    {
        return array_keys((array) $collection);
    }

    /**
     * Remove a $key value in a $collection using $separator notation.
     *
     * @param array|object $collection
     * @param string|array $key
     * @param string $separator
     * @return array|object
     */
    public static function remove($collection, $key, string $separator = '.')
    {
        $key = is_array($key) ? $key : [$key];
        foreach ($key as $k) {
            static::doRemove($collection, $k, $separator);
        }
        return $collection;
    }

    /**
     * Set a $value in a $collection using $separator notation.
     *
     * @param array|object $collection
     * @param string $key
     * @param mixed $value
     * @param string $separator
     * @return array|object
     */
    public static function set($collection, string $key, $value, string $separator = '.')
    {
        static::doSet($collection, $key, $value, $separator);
        return $collection;
    }

    /**
     * Sort a $collection by value, by a closure or by a property $sorter along a $direction
     *
     * @param array|object $collection
     * @param string $direction
     * @param null|callable|string $sorter
     * @return array|object
     */
    public static function sort($collection, string $direction = 'ASC', $sorter = null)
    {
        $array = (array) $collection;
        $direction = strtolower($direction) === 'desc' ? SORT_DESC : SORT_ASC;
        if ($sorter) {
            $results = [];
            foreach ($array as $key => $value) {
                $results[$key] = is_callable($sorter) ? $sorter($value) : static::get($value, $sorter);
            }
        } else {
            $results = $array;
        }
        array_multisort($results, $direction, SORT_REGULAR, $array);
        $collection = is_array($collection) ? $array : (object) $array;
        return $collection;
    }

    /**
     * Sort a $collection by keys or properties by $direction
     *
     * @param array|object $collection
     * @param string $direction
     * @return array|object
     */
    public static function sortKeys($collection, string $direction = 'ASC')
    {
        $array = (array) $collection;
        $direction = strtolower($direction);
        if ($direction === 'asc') {
            ksort($array);
        } else {
            krsort($array);
        }
        $collection = is_array($collection) ? $array : (object) $array;
        return $collection;
    }

    /**
     * Get values from a $collection
     *
     * @param array|object $collection
     * @return array
     */
    public static function values($collection) : array
    {
        return array_values((array) $collection);
    }

    /**
     * Remove a value in a $collection using $separator notation.
     * Internal mechanism without return
     *
     * @param array|object $collection
     * @param string $key
     * @param string $separator
     * @return array|object
     */
    protected static function doRemove(&$collection, string $key, string $separator = '.')
    {
        $segments = explode($separator, $key);
        while (count($segments) > 1) {
            $segment = array_shift($segments);
            if (is_object($collection) && !property_exists(get_class($collection), $segment)) {
                return false;
            }
            if (is_array($collection) && !isset($collection[$segment])) {
                return false;
            }
            if (is_object($collection)) {
                $collection = &$collection->$segment;
            } else {
                $collection = &$collection[$segment];
            }
        }
        $segment = array_shift($segments);
        if (is_object($collection)) {
            unset($collection->$segment);
        } else {
            unset($collection[$segment]);
        }
    }

    /**
     * Set a $value in a $collection using $separator $key notation.
     * Internal mechanism without return
     *
     * @param array|object $collection
     * @param string $key
     * @param mixed $value
     * @param string $separator
     * @return array|object
     */
    protected static function doSet(&$collection, string $key, $value, string $separator = '.')
    {
        if (empty($key)) {
            return $value;
        }
        $segments = explode($separator, $key);
        while (count($segments) > 1) {
            $segment = array_shift($segments);
            if (is_object($collection)) {
                $collection->$segment = static::get($collection, $segment, [], $separator);
                $collection = &$collection->$segment;
            } else {
                $collection[$segment] = static::get($collection, $segment, [], $separator);
                $collection = &$collection[$segment];
            }
        }
        $segment = array_shift($segments);
        if (is_object($collection)) {
            $collection->$segment = $value;
        } else {
            $collection[$segment] = $value;
        }
    }
}
