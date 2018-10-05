<?php
/**
 * Array utilities
 *
 * @package utility
 */

namespace Utility;

use Utility\Str;

class Arr extends Collection
{
    /**
     * Append a $value to an $array
     *
     * @param array $array
     * @param mixed $value
     * @return array
     */
    public static function append(array $array, $value) : array
    {
        array_push($array, $value);
        return $array;
    }

    /**
     * Get average value of an $array
     *
     * @param array $array
     * @param int $decimals
     * @return float
     */
    public static function average(array $array, int $decimals = 0) : float
    {
        return round(array_sum($array) / count($array), $decimals);
    }

    /**
     * Build an $array from a $ruleset blueprint and fallback $defaults
     *
     * @param array $array
     * @param array $ruleset
     * @param array $defaults
     * @return array
     */
    public static function blueprint(array $array, array $ruleset, array $defaults = []) : array
    {
        if (empty($array) || empty($ruleset)) {
            return $defaults;
        }
        $filtered = $defaults;
        if (count($array) === 1 && static::isAssoc($array) && static::intersects($array[0], $rules)) {
            $array = $array[0];
        }
        if (static::isAssoc($array)) {
            foreach ($array as $key => $value) {
                if (!is_numeric($key)) {
                    if (isset($ruleset[$key])) {
                        if (static::abidesAny($value, $ruleset[$key])) {
                            $filtered[$key] = $value;
                            unset($ruleset[$key]);
                            unset($array[$key]);
                        }
                    } else {
                        $filtered[$key] = $value;
                    }
                }
            }
        }
        foreach ($array as $key => $value) {
            if (is_int($key)) {
                foreach ($ruleset as $label => $rules) {
                    if (static::abidesAny($value, $rules)) {
                        $filtered[$label] = $value;
                        unset($ruleset[$label]);
                        break;
                    }
                }
            }
        }
        return $filtered;
    }

    /**
     * Clean all falsy values from an array
     *
     * @param array $array
     * @param bool $normalize
     * @return array
     */
    public static function clean(array $array, bool $normalize = true) : array
    {
        return static::filter($array, function ($value) {
            return (bool) $value;
        }, 0, $normalize);
    }

    /**
     * Check if a $value is in an $array
     *
     * @param array $array
     * @param mixed $value
     * @return bool
     */
    public static function contains(array $array, $value) : bool
    {
        return in_array($value, $array, true);
    }

    /**
     * Check if $array contains all $values
     *
     * @param array $array
     * @param array $values
     * @return bool
     */
    public static function containsAll(array $array, array $values) : bool
    {
        foreach ($values as $value) {
            if (!static::contains($array, $value)) {
                return false;
            }
        }
        return true;
    }

    /**
     * Check if $array contains any of the $values
     *
     * @param array $array
     * @param array $values
     * @return boolean
     */
    public static function containsAny(array $array, array $values) : bool
    {
        foreach ($values as $value) {
            if (static::contains($array, $value)) {
                return true;
            }
        }
        return false;
    }
    
    /**
     * Divide an $array into to arrays, the first containing the keys, the second the values
     *
     * @param array $array
     * @return array
     */
    public static function divide(array $array) : array
    {
        return [
            static::keys($array),
            static::values($array)
        ];
    }

    /**
     * Flatten a multidimensional $array with $separator notation
     *
     * @param array $array
     * @param string $separator
     * @param null|string $parent
     * @return array
     */
    public static function dot(array $array, string $separator = '.', $parent = null) : array
    {
        $_flattened = [];
        foreach ($array as $key => $value) {
            if ($parent) {
                $key = $parent . $separator . $key;
            }
            if (is_array($value)) {
                $value = static::dot($value, $separator, $key);
            }
            $_flattened[$key] = $value;
        }
        $flattened = [];
        foreach ($_flattened as $key => $value) {
            if (is_array($value)) {
                $flattened = array_merge($flattened, $value);
            } else {
                $flattened[$key] = $value;
            }
        }
        return $flattened;
    }

    /**
     * Iterate over an $array and modify the array's values via $callback function
     *
     * @param array $array
     * @param callable $callback
     * @param bool $passKey
     * @return array
     */
    public static function each(array $array, callable $callback, bool $passKey = false) : array
    {
        foreach ($array as $key => $value) {
            $array[$key] = $passKey ? $callback($value, $key) : $callback($value);
        }
        return $array;
    }

    /**
     * Find all items in an $array that pass a $callback truth test
     *
     * @param array $array
     * @param callable $callback
     * @param string|int $pass
     * @param bool $normalize
     * @return array
     */
    public static function filter(array $array, callable $callback, $pass = 'value', bool $normalize = false) : array
    {
        if ($pass === 'value') {
            $pass = 0;
        }
        if ($pass === 'key') {
            $pass = ARRAY_FILTER_USE_KEY;
        }
        if ($pass === 'both') {
            $pass = ARRAY_FILTER_USE_BOTH;
        }
        $array = array_filter($array, $callback, $pass);
        if ($normalize) {
            $array = static::normalize($array);
        }
        return $array;
    }

    /**
     * Find the first item in an $array that passes $callback the truth test
     *
     * @param array $array
     * @param callable $callback
     * @param bool $passKey
     * @return void|mixed
     */
    public static function find(array $array, callable $callback, bool $passKey = false)
    {
        foreach ($array as $key => $value) {
            if ($passKey && $callback($value, $key) || !$passKey && $callback($value)) {
                return $value;
            }
        }
        return;
    }

    /**
     * Find all items in an $array that passes $callback truth test
     *
     * @param array $array
     * @param callable $callback
     * @param boolean $passKey
     * @return array
     */
    public static function findAll(array $array, callable $callback, bool $passKey) : array
    {
        $results = [];
        foreach ($array as $key => $value) {
            if ($passKey && $callback($value, $key) || !$passKey && $callback($value)) {
                $results[] = $value;
            }
        }
        return $results;
    }

    /**
     * Get the first $number of values from an $array
     *
     * @param array $array
     * @param int $number
     * @return mixed
     */
    public static function first(array $array, int $number = 1)
    {
        $first = array_splice($array, 0, $number, true);
        return $number > 1 ? $first : $first[0];
    }

    /**
     * Flatten a multi-dimensional $array into a one-dimenisional array
     *
     * @param array $array
     * @param boolean $preserveKeys
     * @return array
     */
    public static function flatten(array $array, $preserveKeys = true) : array
    {
        $flattened = [];
        array_walk_recursive($array, function ($value, $key) use (&$flattened, $preserveKeys) {
            if ($preserveKeys && !is_int($key)) {
                $flattened[$key] = $value;
            } else {
                $flattened[] = $value;
            }
        });
        return $flattened;
    }

    /**
     * Check if an $array has a $key
     *
     * @param array $array
     * @param int|string $key
     * @return bool
     */
    public static function has(array $array, $key) : bool
    {
        return array_key_exists($key, $array);
    }

    /**
     * Check if an $array has all $keys
     *
     * @param array $array
     * @param array $keys
     * @return bool
     */
    public static function hasAll(array $array, array $keys)
    {
        foreach ($keys as $key) {
            if (!static::has($array, $key)) {
                return false;
            }
        }
        return true;
    }

    /**
     * Check if an $array has any of the $keys
     *
     * @param array $array
     * @param array $keys
     * @return bool
     */
    public static function hasAny(array $array, array $keys)
    {
        foreach ($keys as $key) {
            if (static::has($array, $key)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Implode an $array
     *
     * @param array $array
     * @param string $glue
     * @return string
     */
    public static function implode(array $array, string $glue = '') : string
    {
        return implode($glue, $array);
    }

    /**
     * Get everything from $array but the last $number of items
     *
     * @param array $array
     * @param int $number
     * @return mixed
     */
    public static function initial(array $array, int $number = 1)
    {
        $slice = count($array) - $number;
        return static::first($array, $slice);
    }

    /**
     * Return an array with all elements found in both $a and $b input arrays
     *
     * @param array $a
     * @param array $b
     * @return array
     */
    public static function intersection(array $a, array $b) : array
    {
        return array_values(array_intersect($a, $b));
    }

    /**
     * Return if $a and $b input arrays intersect or not
     *
     * @param array $a
     * @param array $b
     * @return bool
     */
    public static function intersects(array $a, array $b) : bool
    {
        return count(self::intersection($a, $b)) > 0;
    }

    /**
     * Check if an $array is associative
     *
     * @param array $array
     * @return bool
     */
    public static function isAssoc(array $array) : bool
    {
        return array_keys(static::normalize($array)) !== range(0, count($array) - 1);
    }

    /**
     * Check if an $array only has numeric keys
     *
     * @param array $array
     * @return boolean
     */
    public static function isNumeric(array $array) : bool
    {
        foreach (array_keys($array) as $key) {
            if (!is_numeric($key)) {
                return false;
            }
        }
        return true;
    }

    /**
     * Check if $array is a numeric sequential array
     *
     * @param array $array
     * @return boolean
     */
    public static function isSequential(array $array) : bool
    {
        $current = 0;
        foreach (array_keys($array) as $key) {
            if ($key !== $current) {
                return false;
            }
            $current++;
        }
        return true;
    }

    /**
     * Get the last $number of values from an $array
     *
     * @param array $array
     * @param int $number
     * @return mixed
     */
    public static function last(array $array, int $number = 1)
    {
        $last = static::rest($array, -$number);
        return $number > 1 ? $last : $last[0];
    }

    /**
     * Invoke a $callback function on all of the values in an $array
     *
     * @param array $array
     * @param callable $callback
     * @param array $arguments
     * @return array
     */
    public static function map(array $array, callable $callback, $arguments = []) : array
    {
        return array_map($callback, $array, $arguments);
    }

    /**
     * Invoke a  $vallbackfunction on all of the values in an $array recursively
     *
     * @param array $array
     * @param callable $callback
     * @return array
     */
    public static function mapRecursive(array $array, callable $callback) : array
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $array[$key] = call_user_func_array(__METHOD__, [$value, $callback]);
            } elseif (is_scalar($value)) {
                $array[$key] = $callback($value);
            }
        }
        return $array;
    }

    /**
     * Check if all items in an $array match a $callback truth test
     *
     * @param array $array
     * @param callable $callback
     * @return bool
     */
    public static function matches(array $array, callable $callback) : bool
    {
        return count($array) === count(static::filter($array, $callback));
    }

    /**
     * Check if any item in an $array matches a $callback truth test
     *
     * @param array $array
     * @param callable $callback
     * @return bool
     */
    public static function matchesAny(array $array, callable $callback) : bool
    {
        return count(static::filter($array, $callback)) > 0;
    }

    /**
     * Get the max value of an $array
     *
     * @param array $array
     * @param null|callable $callback
     * @return mixed
     */
    public static function max(array $array, $callback = null)
    {
        if ($callback) {
            $array = static::each($array, $callback);
        }
        return max($array);
    }

    /**
     * Get the min value of an $array
     *
     * @param array $array
     * @param null|callable $callback
     * @return mixed
     */
    public static function min(array $array, $callback = null)
    {
        if ($callback) {
            $array = static::each($array, $callback);
        }
        return min($array);
    }

    /**
     * Normalize $array by sorting and filling missing keys
     *
     * @param array $array
     * @return array
     */
    public static function normalize(array $array) : array
    {
        $newArray = [];
        ksort($array);
        foreach ($array as $key => $value) {
            if (is_integer($key)) {
                $newArray[] = $value;
            } else {
                $newArray[$key] = $value;
            }
        }
        return $newArray;
    }

    /**
     * Prepend an $array with a $value
     *
     * @param array $array
     * @param mixed $value
     * @return array
     */
    public static function prepend(array $array, $value) : array
    {
        array_unshift($array, $value);
        return $array;
    }

    /**
     * Get the value per $key from an $array of associative arrays
     *
     * @param array $array
     * @param mixed $key
     * @param boolean $preserveKeys
     * @param boolean $keepEmpty
     * @return array
     */
    public static function pluck(array $array, $key, $preserveKeys = true, bool $keepEmpty = false) : array
    {
        $plucked = [];
        foreach ($array as $originalKey => $value) {
            if (is_object($value)) {
                if (isset($value->{$key})) {
                    if ($preserveKeys) {
                        $plucked[$originalKey] = $value->{$key};
                    } else {
                        $plucked[] = $value->{$key};
                    }
                } elseif ($keepEmpty) {
                    if ($preserveKeys) {
                        $plucked[$originalKey] = $value;
                    } else {
                        $plucked[] = $value;
                    }
                }
            } else {
                if (isset($value[$key])) {
                    if ($preserveKeys) {
                         $plucked[$originalKey] = $value[$key];
                    } else {
                         $plucked[] = $value[$key];
                    }
                } elseif ($keepEmpty) {
                    if ($preserveKeys) {
                        $plucked[$originalKey] = $value;
                    } else {
                        $plucked[] = $value;
                    }
                }
            }
        }
        return $plucked;
    }

    /**
     * Get a $number of random values from an $array
     *
     * @param array $array
     * @param int $number
     * @return mixed
     */
    public static function random(array $array, $number = 1)
    {
        shuffle($array);
        return static::first($array, $number);
    }

    /**
     * Generate an array from a range starting from $base to $stop by $step
     *
     * @param int $base
     * @param int $stop
     * @param int $step
     * @return array
     */
    public static function range(int $base, $stop = null, int $step = 1) : array
    {
        if (!is_null($stop)) {
            $start = $base;
        } else {
            $start = 1;
            $stop = $base;
        }
        return range($start, $stop, $step);
    }

    /**
     * Return all items from an $array that fail the $callback truth test
     *
     * @param array $array
     * @param callable $callback
     * @param bool $passKey
     * @param bool $normalize
     * @return array
     */
    public static function reject(
        array $array,
        callable $callback,
        bool $passKey = false,
        bool $normalize = false
    ) : array {
        $filtered = [];
        foreach ($array as $key => $value) {
            if ($passKey && !$callback($value, $key) || !$passKey && !$callback($value)) {
                $filtered[$key] = $value;
            }
        }
        if ($normalize) {
            $filtered = static::normalize($filtered);
        }
        return $filtered;
    }

    /**
     * Remove the first item from an $array
     *
     * @param array $array
     * @return array
     */
    public static function removeFirst(array $array) : array
    {
        array_shift($array);
        return $array;
    }

    /**
     * Remove the last item from an array
     *
     * @param array $array
     * @return array
     */
    public static function removeLast(array $array) : array
    {
        array_pop($array);
        return $array;
    }

    /**
     * Remove a $value from an $array
     *
     * @param array $array
     * @param mixed $value
     * @param bool $normalize
     * @return array
     */
    public static function removeValue(array $array, $value, bool $normalize = true) : array
    {
        $isNumericArray = true;
        foreach ($array as $key => $val) {
            if ($val === $value) {
                if (!is_int($key)) {
                    $isNumericArray = false;
                }
                unset($array[$key]);
            }
        }
        if ($normalize) {
            $array = static::normalize($array);
        }
        return $array;
    }

    /**
     * Fill an array with some $data a number of $times
     *
     * @param mixed $data
     * @param int $times
     * @return array
     */
    public static function repeat($data, int $times) : array
    {
        if ($times <= 0) {
            return [];
        }
        return array_fill(0, $times, $data);
    }

    /**
     * Replace each $search word or pattern with $replacement inside $array
     *
     * @param array  $array
     * @param string $search
     * @param string $replacement
     * @return array
     */
    public static function replace(array $array, string $search, string $replacement) : array
    {
        return static::each($array, function ($value) use ($search, $replacement) {
            return is_string($value) ? Str::replace($value, $search, $replacement) : $value;
        });
    }

    /**
     * Get the last $number of items of an $array.
     *
     * @param array $array
     * @param int $number
     * @return mixed
     */
    public static function rest(array $array, int $number = 1)
    {
        return array_splice($array, $number);
    }

    /**
     * Reverse an $array
     *
     * @param array $array
     * @return array
     */
    public static function reverse(array $array) : array
    {
        return array_reverse($array);
    }

    /**
     * Search for the index of a value in an array.
     *
     * @param array $array
     * @param mixed $value
     * @return array
     */
    public static function search(array $array, $value) : array
    {
        return array_search($value, $array, true);
    }

    /**
     * Get the size of an array.
     *
     * @param array $array
     * @return int
     */
    public static function size(array $array) : int
    {
        return count($array);
    }

    /**
     * Unflatten a previously flattened $array using $separator notation
     *
     * @param array $array
     * @param string $separator
     * @return array
     */
    public static function undot(array $array, string $separator = '.') : array
    {
        $newArray = [];
        foreach ($array as $key => $value) {
            $newArray = static::set($newArray, $key, $value, $separator);
        }
        return $newArray;
    }

    /**
     * Remove duplicates from an array.
     *
     * @param array $array
     * @return array
     */
    public static function unique(array $array) : array
    {
        return array_reduce($array, function ($results, $value) {
            if (!static::contains($results, $value)) {
                array_push($results, $value);
            }
            return $results;
        }, []);
    }

    /**
     * Return an array without all instances of certain values.
     *
     * @param array $array
     * @param mixed ...$values
     * @return array
     */
    public static function without(array $array, ...$values) : array
    {
        foreach ($values as $value) {
            $array = static::removeValue($array, $value);
        }
        return $array;
    }
}
