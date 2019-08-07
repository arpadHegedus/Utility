<?php
/**
 * Utility functions without the classes
 *
 * @package utility
 */

namespace Utility;

/**
 * Parse the $plural or $singular or $none template of a $number
 *
 * @param float $number
 * @param string $plural
 * @param string $singular
 * @param string $none
 * @return string
 */
function accord(float $number, string $plural, string $singular, string $none = '') : string
{
    return Num::accord($number, $plural, $singular, $none);
}

/**
 * Check if $data abides an array of $rules
 *
 * @param mixed $data
 * @param array|callable $rules
 * @return bool
 */
function abides($data, $rules = []) : bool
{
    return Misc::abides($data, $rules);
}

/**
 * Check if $data abides any of an array of $rules
 *
 * @param mixed $data
 * @param string|array|callable $rules
 * @return bool
 */
function abides_any($data, $rules = []) : bool
{
    return Misc::abidesAny($data, $rules);
}

/**
 * Add mixed $data to other mixed data cleverly
 *
 * @param mixed ...$data
 * @return mixed
 */
function add(...$data)
{
    return Misc::add(...$data);
}

/**
 * Check if an $array has all of the $keys
 *
 * @param array $keys
 * @param array $array
 * @return bool
 */
function array_all_keys_exist(array $keys, array $array) : bool
{
    return Arr::hasAll($array, $keys);
}

/**
 * Check if an $array has any of the $keys
 *
 * @param array $keys
 * @param array $array
 * @return bool
 */
function array_any_key_exists(array $keys, array $array) : bool
{
    return Arr::hasAny($array, $keys);
}

/**
 * Get average value of an $array
 *
 * @param array $array
 * @param int $decimals
 * @return float
 */
function array_average(array $array, int $decimals = 0) : float
{
    return Arr::average($array, $decimals);
}

/**
 * Clean all falsy values from an array
 *
 * @param array $array
 * @param bool $normalize
 * @return array
 */
function array_clean(array $array, bool $normalize = true) : array
{
    return Arr::clean($array, $normalize);
}

/**
 * Check if a $value is in an $array
 *
 * @param array $array
 * @param mixed $value
 * @return bool
 */
function array_contains(array $array, $value) : bool
{
    return Arr::contains($array, $value);
}

/**
 * Check if $array contains all $values
 *
 * @param array $array
 * @param array $values
 * @return bool
 */
function array_contains_all(array $array, array $values) : bool
{
    return Arr::containsAll($array, $values);
}

/**
 * Check if $array contains any $values
 *
 * @param array $array
 * @param array $values
 * @return bool
 */
function array_contains_any(array $array, array $values) : bool
{
    return Arr::containsAny($array, $values);
}

/**
 * Divide an $array into to arrays, the first containing the keys, the second the values
 *
 * @param array $array
 * @return array
 */
function array_divide(array $array) : array
{
    return Arr::divide($array);
}

/**
 * Flatten a multidimensional $array with $separator notation
 *
 * @param array $array
 * @param string $separator
 * @param null|string $parent
 * @return array
 */
function array_dot(array $array, string $separator = '.', $parent = null) : array
{
    return Arr::dot($array, $separator, $parent);
}

/**
 * Iterate over an $array and modify the array's values via $callback function
 *
 * @param array $array
 * @param callable $callback
 * @param bool $pass_key
 * @return array
 */
function array_each(array $array, callable $callback, bool $pass_key = false) : array
{
    return Arr::each($array, $callback, $pass_key);
}

/**
 * Find the first item in an $array that passes $callback the truth test
 *
 * @param array $array
 * @param callable $callback
 * @param bool $pass_key
 * @return void|mixed
 */
function array_find(array $array, callable $callback, bool $pass_key = false)
{
    return Arr::find($array, $callback, $pass_key);
}

/**
 * Find all items in an $array that passes $callback truth test
 *
 * @param array $array
 * @param callable $callback
 * @param boolean $passKey
 * @return array
 */
function array_find_all(array $array, callable $callback, bool $pass_key = false)
{
    return Arr::findAll($array, $callback, $pass_key);
}

/**
 * Get the first $number of values from an $array
 *
 * @param array $array
 * @param int $number
 * @return mixed
 */
function array_first(array $array, int $number = 1)
{
    return Arr::fist($array, $number);
}

/**
 * Flatten a multi-dimensional $array into a one-dimenisional array
 *
 * @param array $array
 * @param boolean $preserve_keys
 * @return array
 */
function array_flatten(array $array, $preserve_keys = true) : array
{
    return Arr::flatten($array, $preserve_keys);
}

/**
 * Group values from a $collection according to the results of a $callback
 *
 * @param array|object $collection
 * @param callable $callback
 * @return array
 */
function array_group($collection, callable $callback) : array
{
    return Collection::group($collection, $callback);
}

/**
 * Get everything from $array but the last $number of items
 *
 * @param array $array
 * @param int $number
 * @return mixed
 */
function array_initial(array $array, int $number = 1)
{
    return Arr::initial($array, $number);
}

/**
 * Return an array with all elements found in both $a and $b input arrays
 *
 * @param array $a
 * @param array $b
 * @return array
 */
function array_intersection(array $a, array $b) : array
{
    return Arr::intersection($a, $b);
}

/**
 * Return if $a and $b input arrays intersect or not
 *
 * @param array $a
 * @param array $b
 * @return bool
 */
function array_intersects(array $a, array $b) : bool
{
    return Arr::intersects($a, $b);
}

/**
 * Get the last $number of values from an $array
 *
 * @param array $array
 * @param int $number
 * @return mixed
 */
function array_last(array $array, int $number = 1)
{
    return Arr::last($array, $number);
}

/**
 * Invoke a  $vallbackfunction on all of the values in an $array recursively
 *
 * @param callable $callback
 * @param array $array
 * @param array $arrays...
 * @return array
 */
function array_map_recursive(callable $callback, array $array, array ...$arrays) : array
{
    return Arr::mapRecursive($array, $callback);
}

/**
 * Check if all items in an $array match a $callback truth test
 *
 * @param array $array
 * @param callable $callback
 * @return bool
 */
function array_matches(array $array, callable $callback) : bool
{
    return Arr::matches($array, $callback);
}

/**
 * Check if any item in an $array matches a $callback truth test
 *
 * @param array $array
 * @param callable $callback
 * @return bool
 */
function array_matches_any(array $array, callable $callback) : bool
{
    return Arr::matchesAny($array, $callback);
}

/**
 * Get the max value of an $array
 *
 * @param array $array
 * @param null|callable $callback
 * @return mixed
 */
function array_max(array $array, $callback = null)
{
    return Arr::max($array);
}

/**
 * Get the min value of an $array
 *
 * @param array $array
 * @param null|callable $callback
 * @return mixed
 */
function array_min(array $array, $callback = null)
{
    return Arr::min($array, $callback);
}

/**
 * Normalize $array by sorting and filling missing keys
 *
 * @param array $array
 * @return array
 */
function array_normalize(array $array) : array
{
    return Arr::normalize($array);
}

/**
 * Get the value per $key from an $array of associative arrays
 *
 * @param array $array
 * @param mixed $key
 * @param boolean $preserve_keys
 * @param boolean $keep_empty
 * @return array
 */
function array_pluck(array $array, $key, $preserve_keys = true, bool $keep_empty = false) : array
{
    return Arr::pluck($array, $key, $preserve_keys, $keep_empty);
}

/**
 * Get a $number of random values from an $array
 *
 * @param array $array
 * @param int $number
 * @return mixed
 */
function array_random_value(array $array, $number = 1)
{
    return Arr::random($array, $number);
}

/**
 * Generate an array from a range starting from $base to $stop by $step
 *
 * @param int $base
 * @param int $stop
 * @param int $step
 * @return array
 */
function array_range(int $base, $stop = null, int $step = 1) : array
{
    return Arr::range($base, $stop, $step);
}

/**
 * Return all items from an $array that fail the $callback truth test
 *
 * @param array $array
 * @param callable $callback
 * @param bool $pass_key
 * @param bool $normalize
 * @return array
 */
function array_reject(array $array, callable $callback, bool $pass_key = false, bool $normalize = false) : array
{
    return Arr::reject($array, $callback, $pass_key, $normalize);
}

/**
 * Remove a $value from an $array
 *
 * @param mixed $value
 * @param array $array
 * @param bool $normalize
 * @return array
 */
function array_remove($value, array $array, bool $normalize = true) : array
{
    return Arr::removeValue($array, $value, $normalize);
}

/**
 * Fill an array with some $data a number of $times
 *
 * @param mixed $data
 * @param int $times
 * @return array
 */
function array_repeat($data, int $times) : array
{
    return Arr::repeat($data, $times);
}

/**
 * Get the last $number of items of an $array.
 *
 * @param array $array
 * @param int $number
 * @return mixed
 */
function array_rest(array $array, int $number = 1)
{
    return Arr::rest($array, $number);
}

/**
 * Replace each $search word or pattern with $replacement inside $array
 *
 * @param string $search
 * @param string $replacement
 * @param array  $array
 * @return array
 */
function array_str_replace(string $search, string $replacement, array $array) : array
{
    return Arr::replace($array, $search, $replacement);
}

/**
 * Unflatten a previously flattened $array using $separator notation
 *
 * @param array $array
 * @param string $separator
 * @return array
 */
function array_undot(array $array, string $separator = '.') : array
{
    return Arr::undot($array, $separator);
}

/**
 * Return an array without all instances of certain values.
 *
 * @param array $array
 * @param mixed ...$values
 * @return array
 */
function array_without(array $array, ...$values) : array
{
    return Arr::without($array, ...$values);
}

/**
 * Build an $array from a $ruleset blueprint and fallback $defaults
 *
 * @param array $array
 * @param array $ruleset
 * @param array $defaults
 * @return array
 */
function blueprint(array $array, array $ruleset, array $defaults = []) : array
{
    return Arr::blueprint($array, $ruleset, $defaults);
}

/**
 * Get the current URL or its $parts
 *
 * @param array $parts
 * @return string
 */
function current_url(array $parts = []) : string
{
    return URL::current($parts);
}

/**
 * Dump $data and die
 *
 * @param mixed ...$data
 * @return void
 */
function dd(...$data) : void
{
    Misc::dd(...$data);
}

/**
 * Get a value of a $collection by a $path of $separator notation with $default fallback
 *
 * @param array|object $collection
 * @param string $path
 * @param mixed $default
 * @param string $separator
 * @return mixed
 */
function dot_get($collection, string $path = '', $default = null, string $separator = '.')
{
    return Collection::get($collection, $path, $default, $separator);
}

/**
 * Remove a $path value in a $collection using $separator notation.
 *
 * @param array|object $collection
 * @param string|array $path
 * @param string $separator
 * @return array|object
 */
function dot_remove($collection, string $path, string $separator = '.')
{
    return Collection::remove($collection, $path, $separator);
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
function dot_set($collection, string $path, $value, string $separator = '.')
{
    return Collection::set($collection, $path, $value, $separator);
}

/**
 * Dry dump $data for debug
 *
 * @param mixed ...$data
 * @return void
 */
function dump(...$data) : void
{
    Misc::dump(...$data);
}

/**
 * Check if $string ends with $needle
 *
 * @param string $string
 * @param string $needle
 * @param bool $case_sensitive
 * @param null|string $encoding
 * @return bool
 */
function ends_with(string $string, string $needle, bool $case_sensitive = false, $encoding = null) : bool
{
    return Str::endsWith($string, $needle, $case_sensitive, $encoding);
}

/**
 * Check if $string ends with any of the $needles
 *
 * @param string $string
 * @param array $needles
 * @param bool $case_sensitive
 * @param null|string $encoding
 * @return bool
 */
function ends_with_any(string $string, array $needles, bool $case_sensitive = false, $encoding = null) : bool
{
    return Str::endsWithAny($string, $needles, $case_sensitive, $encoding);
}

/**
 * Esnure $string starts with $ensure
 *
 * @param string $string
 * @param string $ensure
 * @return string
 */
function ensure_left(string $string, string $ensure) : string
{
    return Str::ensureLeft($string, $ensure);
}

/**
 * Ensure $string ends with $ensure
 *
 * @param string $string
 * @param string $ensure
 * @return string
 */
function ensure_right(string $string, string $ensure) : string
{
    return Str::ensureRight($string, $ensure);
}

/**
 * Get filesize from $bytes
 *
 * @param float $bytes
 * @param int $decimals
 * @return string
 */
function filesize_format(float $bytes, int $decimals = 0) : string
{
    return Num::fileSize($bytes, $decimals);
}

/**
 * Cache the return of a $function and return the value from cache in subsequent calls
 *
 * @param callable $function
 * @return void
 */
function func_cache(callable $function)
{
    return Func::cache($function);
}

/**
 * Limit a $function to be only called once
 *
 * @param callable $function
 * @param bool $unique
 * @return void
 */
function func_once(callable $function, bool $unique = false)
{
    return Func::once($function, $unique);
}

/**
 * Limit a $function to be only called a certain number of $times
 *
 * @param callable $function
 * @param int $times
 * @param bool $unique
 * @return void
 */
function func_only(callable $function, int $times = 1, bool $unique = false)
{
    return Func::only($function, $times, $unique);
}

/**
 * Throttle a $function so that it can only be called once in every $miliseconds
 *
 * @param callable $function
 * @param integer $miliseconds
 * @return void
 */
function func_throttle(callable $function, int $miliseconds = 300)
{
    return Func::throttle($function, $miliseconds);
}

/**
 * Get lat lng data from an address
 *
 * @param string $address
 * @param array $apiParameters
 * @return null|string
 */
function geo_address(string $address, array $apiParameters = []) : ? string
{
    return Geo::address($address, $apiParameters);
}

/**
 * Get geo data from an address
 *
 * @param string $address
 * @param array $apiParameters
 * @return null|array
 */
function geo_address_data(string $address, array $apiParameters = []) : ? array
{
    return Geo::getAddress($address, $apiParameters);
}

/**
 * Get lat lng data from an address
 *
 * @param string $address1
 * @param string $address2
 * @param array $apiParameters
 * @param string $unit
 * @return null|string
 */
function geo_address_distance(string $address1, string $address2, array $apiParameters = [], string $unit = 'M')
{
    return Geo::addressDistance($address1, $address2, $apiParameters, $unit);
}

/**
 * Get the distance between 2 pairs of lat and lng values in various units
 *
 * @param float $lat1
 * @param float $lng1
 * @param float $lat2
 * @param float $lng2
 * @param string $unit
 * @return null|string
 */
function geo_distance(float $lat1, float $lng1, float $lat2, float $lng2, string $unit = 'M') : ? string
{
    return Geo::distance($lat1, $lng1, $lat2, $lng2, $unit);
}

/**
 * Get the distance between 2 pairs of lat and lng values in various units
 *
 * @param float $lat1
 * @param float $lng1
 * @param float $lat2
 * @param float $lng2
 * @return array
 */
function geo_distance_data(float $lat1, float $lng1, float $lat2, float $lng2) : array
{
    return Geo::getDistance($lat1, $lng1, $lat2, $lng2);
}

/**
 * Get a simplified type of a variable.
 * Return values: string|array|object|number|boolean|unknown
 *
 * @param mixed $data
 * @return string
 */
function get_shallow_type($data) : string
{
    return Misc::getShallowType($data);
}

/**
 * Check if $string is alfa
 *
 * @param string $string
 * @return bool
 */
function is_alpha(string $string) : bool
{
    return Str::isAlpha($string);
}

/**
 * Check if $string is alfa numeric
 *
 * @param string $string
 * @return bool
 */
function is_alphanumeric(string $string) : bool
{
    return Str::isAlphaNumeric($string);
}

/**
 * Check if an $array is associative
 *
 * @param array $array
 * @return bool
 */
function is_associative_array(array $array) : bool
{
    return Arr::isAssoc($array);
}

/**
 * Check if $string is base 64 encoded
 *
 * @param string $string
 * @return bool
 */
function is_base64(string $string) : bool
{
    return Str::isBase64($string);
}

/**
 * Check if $number is between $min and $max
 *
 * @param float $number
 * @param float $min
 * @param float $max
 * @return bool
 */
function is_between(float $number, float $min = 0, float $max = 1) : bool
{
    return Num::isBetween($number, $min, $max);
}

/**
 * Check if $string is empty or has only white space
 *
 * @param string $string
 * @return bool
 */
function is_blank(string $string) : bool
{
    return Str::isBlank($string);
}

/**
 * Check if $string is a valid email
 *
 * @param string $string
 * @return bool
 */
function is_email(string $string) : bool
{
    return Str::isEmail($string);
}

/**
 * Check if a $number is even
 *
 * @param float $number
 * @return bool
 */
function is_even(float $number) : bool
{
    return Num::isEven($number);
}

/**
 * Check if $string is hexadecimal
 *
 * @param string $string
 * @return bool
 */
function is_hexadecimal(string $string) : bool
{
    return Str::isHexadecimal($string);
}

/**
 * Check if $string contains HTML code
 *
 * @param string $string
 * @return bool
 */
function is_html(string $string) : bool
{
    return Str::isHTML($string);
}

/**
 * Check if $string is a valid IP address
 *
 * @param string $string
 * @return bool
 */
function is_ip(string $string) : bool
{
    return Str::isIP($string);
}

/**
 * Check if $string is valid JSON
 *
 * @param string $string
 * @return bool
 */
function is_json(string $string) : bool
{
    return Str::isJSON($string);
}

/**
 * Check if $string is lower-case
 *
 * @param string $string
 * @return bool
 */
function is_lower(string $string) : bool
{
    return Str::isLower($string);
}

/**
 * Check if an $array only has numeric keys
 *
 * @param array $array
 * @return boolean
 */
function is_numeric_array(array $array) : bool
{
    return Arr::isNumeric($array);
}

/**
 * Check if a $number is odd
 *
 * @param float $number
 * @return bool
 */
function is_odd(float $number) : bool
{
    return Num::isOdd($number);
}

/**
 * Check if a $number is outside of $min and $max
 *
 * @param float $number
 * @param float $min
 * @param float $max
 * @return bool
 */
function is_outside(float $number, float $min = 0, float $max = 1) : bool
{
    return Num::isOutside($number, $min, $max);
}

/**
 * Check if $string is a valid regex
 *
 * @param string $pattern
 * @return bool
 */
function is_regex(string $string) : bool
{
    return Str::isRegex($string);
}

/**
 * Check if $array is a numeric sequential array
 *
 * @param array $array
 * @return boolean
 */
function is_sequential_array(array $array) : bool
{
    return Arr::isSequential($array);
}

/**
 * Check if $string is serialized
 *
 * @param string $string
 * @return bool
 */
function is_serialized(string $string) : bool
{
    return Str::isSerialized($string);
}

/**
 * Check if $string is upper case
 *
 * @param string $string
 * @return bool
 */
function is_upper(string $string) : bool
{
    return Str::isUpper($string);
}

/**
 * Check if $string is a valid URL
 *
 * @param string $string
 * @return bool
 */
function is_url(string $string) : bool
{
    return Str::isURL($string);
}

/**
 * Safely truncate $string in $length
 *
 * @param string $string
 * @param int $length
 * @param string $append
 * @param null|string $encoding
 * @return string
 */
function limit(string $string, int $length, string $append = '...', $encoding = null) : string
{
    return Str::limit($string, $length, $append, $encoding);
}

/**
 * Limit $string to a $limit of words
 *
 * @param string $string
 * @param int $length
 * @return string
 */
function limit_words(string $string, int $length, string $append = '...')
{
    return Str::limitWords($string, $length, $append);
}

/**
 * Merge mixed $data to other mixed data cleverly
 *
 * @param mixed ...$data
 * @return mixed
 */
function merge(...$data)
{
    return Misc::merge(...$data);
}

/**
 * Limit $number to $min and $max values
 *
 * @param float $number
 * @param float $min
 * @param float $max
 * @return float
 */
function number_limit(float $number, float $min = 0, float $max = 1) : float
{
    return Num::limit($number, $min, $max);
}

/**
 * Limit $number to a $max value
 *
 * @param float $number
 * @param float $max
 * @return float
 */
function number_max(float $number, float $max = 0) : float
{
    return Num::max($number, $max);
}

/**
 * Limit $number to a $min value
 *
 * @param float $number
 * @param float $min
 * @return float
 */
function number_min(float $number, float $min = 0) : float
{
    return Num::min($number, $min);
}

/**
 * Pad a $number to a $length with $pad from a $direction
 *
 * @param float $number
 * @param int $length
 * @param string $pad
 * @param string $direction
 * @return string
 */
function number_pad(float $number, int $length, string $pad = '0', string $direction = 'left') : string
{
    return Num::pad($number, $length, $pad, $direction);
}

/**
 * Check if an $object has a $key (property or method)
 *
 * @param object $array
 * @param string $key
 * @return bool
 */
function obj_has($object, string $key) : bool
{
    return Obj::has($object, $key);
}

/**
 * Get all properties from an $object
 *
 * @param object $object
 * @return array
 */
function obj_properties($object)
{
    return Obj::properties($object);
}

/**
 * Get all methods from an $object
 *
 * @param object $object
 * @return null|array
 */
function obj_methods($object)
{
    return Obj::methods($object);
}

/**
 * Unpack an $attribute from an $object
 *
 * @param object $data
 * @param null|string $attribute
 * @return object
 */
function obj_unpack($data, $attribute = null)
{
    return Obj::unpack($data, $attribute);
}

/**
 * Get the ordinal form of a $number using a $template
 *
 * @param float $number
 * @param string $template
 * @return string
 */
function ordinal(float $number, string $template = '%number<sup>%ordinal</sup>') : string
{
    return Num::ordinal($number, $template);
}

/**
 * Check the percentage of $number relative to $normal
 *
 * @param float $number
 * @param float $normal
 * @return float
 */
function percent_of(float $number, float $normal = 100) : float
{
    return Num::percentOf($number, $normal);
}

/**
 * Remove special characters and change whitespace characters with $delimiter in $string
 *
 * @param string $string
 * @param string $delimiter
 * @param string $language
 * @return string
 */
function slugify(string $string, $delimiter = '-', $language = 'en') : string
{
    return Str::slugify($string, $delimiter, $language);
}

/**
 * Convert spaces to tabs in $string
 *
 * @param string $string
 * @param int $tabLength
 * @return string
 */
function spaces_to_tabs(string $string, $tabLength = 4) : string
{
    return Str::spacesToTabs($string, $tabLength);
}

/**
 * Check if $string starts with $needle
 *
 * @param string $string
 * @param string $needle
 * @param bool $case_sensitive
 * @param null|string $encoding
 * @return bool
 */
function starts_with(string $string, string $needle, bool $case_sensitive = false, $encoding = null) : bool
{
    return Str::startsWith($string, $needle, $case_sensitive, $encoding);
}

/**
 * Check if $string starts with any of the $needles
 *
 * @param string $string
 * @param array $needles
 * @param bool $case_sensitive
 * @param null|string $encoding
 * @return bool
 */
function starts_with_any(string $string, array $needles, bool $case_sensitive = false, $encoding = null) : bool
{
    return Str::startsWithAny($string, $needles, $case_sensitive, $encoding);
}

/**
 * Convert a $string to alpha
 *
 * @param string $string
 * @return string
 */
function str_alpha(string $string) : string
{
    return Str::alpha($string);
}

/**
 * Convert a $string to alpha numeric
 *
 * @param string $string
 * @return string
 */
function str_alphanumeric(string $string) : string
{
    return Str::alphaNumeric($string);
}

/**
 * Convert a $string to ASCII removing all accents
 *
 * @param string $string
 * @param string $language
 * @param bool $remove_unsupported
 * @return string
 */
function str_ascii(string $string, $language = 'en', $remove_unsupported = true) : string
{
    return Str::ascii($string, $language, $remove_unsupported);
}

/**
 * Get part of a $string between $start and $end substrings
 *
 * @param string $string
 * @param string $start
 * @param string $end
 * @param int $offset
 * @param null|string $encoding
 * @return string
 */
function str_between(string $string, string $start, string $end, int $offset = 0, $encoding = null) : string
{
    return Str::between($string, $start, $end, $offset, $encoding);
}

/**
 * Convert a $string to a bool
 *
 * @param string $string
 * @param array $trueValues
 * @param array $falseValues
 * @return bool
 */
function str_bool(string $string, array $true_values = [], array $false_values = []) : bool
{
    return Str::bool($string, $true_values, $false_values);
}

/**
 * Convert a $string to camelCase using a specific $language
 *
 * @param string $string
 * @param string $language
 * @return string
 */
function str_camel(string $string, $language = '') : string
{
    return Str::camel($string, $language);
}

/**
 * Get all distinct characters of a $string as an array
 *
 * @param string $string
 * @param null|string $encoding
 * @return array
 */
function str_chars(string $string, $encoding = null) : array
{
    return Str::chars($string, $encoding);
}

/**
 * Normalize and trim a $string
 *
 * @param string $string
 * @return string
 */
function str_clean(string $string) : string
{
    return Str::clean($string);
}

/**
 * Ensure all white space characters only appear once in a $string
 *
 * @param string $string
 * @return string
 */
function str_collapse(string $string) : string
{
    return Str::collapse($string);
}

/**
 * Find a common sub string from $string and $other_string
 *
 * @param string $string
 * @param string $other_string
 * @param null|string $encoding
 * @return string
 */
function str_common(string $string, string $other_string, $encoding = null) : string
{
    return Str::common($string, $other_string, $encoding);
}

/**
 * Find a common prefix from $string and $other_string
 *
 * @param string $string
 * @param string $other_string
 * @param null|string $encoding
 * @return string
 */
function str_common_prefix(string $string, string $other_string, $encoding = null) : string
{
    return Str::commonPrefix($string, $other_string, $encoding);
}

/**
 * Find a common suffix from $string and $other_string
 *
 * @param string $string
 * @param string $other_string
 * @param null|string $encoding
 * @return string
 */
function str_common_suffix(string $string, string $other_string, $encoding = null) : string
{
    return Str::commonSuffix($string, $other_string, $encoding);
}

/**
 * Check if $string contains $needle
 *
 * @param string $string
 * @param string $needle
 * @param bool $case_sensitive
 * @param null|string $encoding
 * @return bool
 */
function str_contains(string $string, string $needle, bool $case_sensitive = false, $encoding = null) : bool
{
    return Str::contains($string, $needle, $case_sensitive, $encoding);
}

/**
 * Check if $string contains all substrings in a $needles array
 *
 * @param string $string
 * @param array $needles
 * @param bool $case_sensitive
 * @param null|string $encoding
 * @return bool
 */
function str_contains_all(string $string, array $needles, bool $case_sensitive = false, $encoding = null) : bool
{
    return Str::containsAll($string, $needles, $case_sensitive, $encoding);
}

/**
 * Check if $string contains any substrings in a $needles array
 *
 * @param string $string
 * @param array $needles
 * @param bool $case_sensitive
 * @param null|string $encoding
 * @return bool
 */
function str_contains_any(string $string, array $needles, bool $case_sensitive = false, $encoding = null) : bool
{
    return Str::containsAny($string, $needles, $case_sensitive, $encoding);
}

/**
 * Count how many times $string contains $needle
 *
 * @param string $string
 * @param string $needle
 * @param bool $case_sensitive
 * @param null|string $encoding
 * @return int
 */
function str_contains_times(string $string, string $needle, bool $case_sensitive = false, $encoding = null) : int
{
    return Str::timesContains($string, $needle, $case_sensitive, $encoding);
}

/**
 * Push $insert into $string at the $index character
 *
 * @param string $string
 * @param string $insert
 * @param int $index
 * @param null|string $encoding
 * @return string
 */
function str_insert(string $string, string $insert, int $index = 0, $encoding = null) : string
{
    return Str::insert($string, $insert, $index, $encoding);
}

/**
 * Get an array of lines in $string
 *
 * @param string $string
 * @param bool $trimEachLine
 * @return array
 */
function str_lines(string $string, bool $trimEachLine = false) : array
{
    return Str::lines($string, $trimEachLine);
}

/**
 * Convert $string to lower case
 *
 * @param string $string
 * @param null|string $encoding
 * @return string
 */
function str_lower(string $string, $encoding = null) : string
{
    return Str::lower($string, $encoding);
}

/**
 * Convert the first character of each word in $string to lower case
 *
 * @param string $string
 * @param null|string $encoding
 * @return string
 */
function str_lower_first(string $string, $encoding = null) : string
{
    return Str::lowerFirst($string, $encoding);
}

/**
 * Check if $string matches $pattern
 *
 * @param string $string
 * @param string $pattern
 * @return bool
 */
function str_matches(string $string, string $pattern) : bool
{
    return Str::matches($string, $pattern);
}

/**
 * Convert punctuation characters to a standardised, simpler version
 *
 * @param string $string
 * @return string
 */
function str_normalize(string $string) : string
{
    return Str::normalize($string);
}

/**
 * Convert $string to PascalCase
 *
 * @param string $string
 * @return string
 */
function str_pascal(string $string) : string
{
    return Str::pascal($string);
}

/**
 * Generate random or $readable random string of $length
 *
 * @param integer $length
 * @param boolean $readable
 * @return string
 */
function str_random(int $length = 10, bool $readable = true) : string
{
    return Str::random($length, $readable);
}

/**
 * Reverse the characters of $string
 *
 * @param string $string
 * @param null|string $encoding
 * @return string
 */
function str_reverse(string $string, $encoding = null) : string
{
    return Str::reverse($string, $encoding);
}

/**
 * Cut $string from $start to $end
 *
 * @param string $string
 * @param int $start
 * @param null|int $end
 * @param null|string $encoding
 * @return string
 */
function str_slice(string $string, int $start, $end = null, $encoding = null) : string
{
    return Str::slice($string, $start, $end, $encoding);
}

/**
 * Convert $string to slug-case
 *
 * @param string $string
 * @param string $language
 * @return string
 */
function str_slug(string $string, $language = 'en') : string
{
    return Str::slug($string, $language);
}

/**
 * Convert $string to snake_case
 *
 * @param string $string
 * @param string $language
 * @return string
 */
function str_snake(string $string, $language = 'en') : string
{
    return Str::snake($string, $language);
}

/**
 * Replace template variables in $string according to associate $data array
 *
 * @param string $string
 * @param array $data
 * @param string $var_symbol
 * @return string
 */
function str_template(string $string, array $data = [], string $var_symbol = '%') : string
{
    return Str::template($string, $data, $var_symbol);
}

/**
 * Convert $string to Title Case
 *
 * @param string $string
 * @param null|string $encoding
 * @return string
 */
function str_title(string $string, $encoding = null) : string
{
    return Str::title($strin, $encoding);
}

/**
 * Trim $characters from each end of a $string
 *
 * @param string $string
 * @param string $characters
 * @return string
 */
function str_trim(string $string, string $characters = ' ') : string
{
    return Str::trim($string, $characters);
}

/**
 * Trim $characters from the left side of $string
 *
 * @param string $string
 * @param string $characters
 * @return string
 */
function str_trim_left(string $string, string $characters = ' ') : string
{
    return Str::trimLeft($string, $characters);
}

/**
 * Trim $characters from the right side of $string
 *
 * @param string $string
 * @param string $characters
 * @return string
 */
function str_trim_right(string $string, string $characters = ' ') : string
{
    return Str::trimRight($string, $characters);
}

/**
 * Convert string to UPPER CASE
 *
 * @param string $string
 * @param null|string $encoding
 * @return string
 */
function str_upper(string $string, $encoding = null) : string
{
    return Str::upper($string, $encoding);
}

/**
 * Upper Case first character of each word in $string
 *
 * @param string $string
 * @param null|string $encoding
 * @return string
 */
function str_upper_first(string $string, $encoding = null) : string
{
    return Str::upperFirst($string, $encoding);
}

/**
 * Remove all white space characters from $string
 *
 * @param string $string
 * @return string
 */
function strip_whitespace(string $string) : string
{
    return Str::stripWhitespace($string);
}

/**
 * Get all positions of $needle within $string
 *
 * @param string $haystack
 * @param string $needle
 * @return array
 */
function strpos_all(string $haystack, string $needle) : array
{
    return Str::indexes($haystack, $needle);
}

/**
 * Convert tabs to spaces in $string
 *
 * @param string $string
 * @param int $tabsLength
 * @return array
 */
function tabs_to_spaces(string $string, $tabLength = 4) : string
{
    return Str::tabsToSpaces($string, $tabLength);
}

/**
 * Convert $string to Title Case with an $ignore list of words that would not be converted to uppercase
 *
 * @param string $string
 * @param array $ignore
 * @param null|string $encoding
 * @return string
 */
function titlize(string $string, array $ignore = [], $encoding = null) : string
{
    return Str::titlize($string, $ignore, $encoding);
}

/**
 * Add $user and $pass to a $url
 *
 * @param string $user
 * @param null|string $pass
 * @param null|string|array $url
 * @return string
 */
function url_auth(string $user, $pass = null, $url = null) : string
{
    return URL::auth($url, $user, $pass);
}

/**
 * Build a URL from a parsed array
 *
 * @param array $url
 * @return string
 */
function url_build(array $url) : string
{
    return URL::build($url);
}

/**
 * Get or $set the fragment of a $url
 *
 * @param null|string|array $url
 * @param boolean $set
 * @return string
 */
function url_fragment($url = null, $set = false) : string
{
    return URL::fragment($url, $set);
}

/**
 * Set $fragment part of a $url
 *
 * @param null|string|array $url
 * @param string $fragment
 * @return string
 */
function url_fragment_set(string $fragment, $url = null) : string
{
    return URL::fragmentSet($url, $fragment);
}

/**
 * Get or $set the host of a $url
 *
 * @param null|string|array $url
 * @param boolean $set
 * @return string
 */
function url_host($url = null, $set = false) : string
{
    return URL::host($url, $set);
}

/**
 * Set $host part of a $url
 *
 * @param string $host
 * @param null|string|array $url
 * @return string
 */
function url_host_set(string $host, $url = null) : string
{
    return URL::hostSet($url, $host);
}

/**
 * Consistently parse $url
 *
 * @param string $url
 * @return array
 */
function url_parse(string $url)
{
    return URL::parse($url);
}

/**
 * Get $parts of a $url
 *
 * @param array|string $part
 * @param null|string|array $url
 * @return string
 */
function url_parts($parts = ['scheme', 'host', 'path'], $url = null) : string
{
    return URL::parts($url, $parts);
}

/**
 * Get the pass part of a $url
 *
 * @param null|string|array $url
 * @return string
 */
function url_pass($url = null) : string
{
    return URL::pass($url);
}

/**
 * Get or $set the path of a $url
 *
 * @param null|string|array $url
 * @param boolean $set
 * @return string
 */
function url_path($url = null, $set = false) : string
{
    return URL::path($url, $set);
}

/**
 * Remove $search string or pattern from $url path
 *
 * @param string $remove
 * @param null|string|array $url
 * @return string
 */
function url_path_remove(string $search, $url = null) : string
{
    return URL::pathRemove($url, $search);
}

/**
 * Set $path part of a $url
 *
 * @param string $path
 * @param null|string|array $url
 * @return string
 */
function url_path_set(string $path, $url = null) : string
{
    return URL::pathSet($url, $path);
}

/**
 * Get or $set the port of a $url
 *
 * @param null|string|array $url
 * @param boolean $set
 * @return string
 */
function url_port($url = null, $set = false) : string
{
    return URL::port($url, $set);
}

/**
 * Set $port part of a $url
 *
 * @param string|int $port
 * @param null|string|array $url
 * @return string
 */
function url_port_set($port, $url = null) : string
{
    return URL::portSet($url, $port);
}

/**
 * Get or $set the query of a $url
 *
 * @param null|string|array $url
 * @param boolean $set
 * @return string
 */
function url_query($url = null, $set = false) : string
{
    return URL::query($url, $set);
}

/**
 * Add a parameter $key and $value to the query of the $url
 *
 * @param string $key
 * @param mixed $value
 * @param null|string|array $url
 * @return string
 */
function url_query_add(string $key, $value, $url = null) : string
{
    return URL::queryAdd($url, $key, $value);
}

/**
 * Get the array of query args from a $url
 *
 * @param null|string|array $url
 * @return array
 */
function url_query_array($url = null) : array
{
    return URL::queryArray($url);
}

/**
 * Get a query parameter from a URL
 *
 * @param string $parameter
 * @param null|string|array $url
 * @return mixed
 */
function url_query_get($parameter, $url = null)
{
    return URL::queryGet($url, $parameter);
}

/**
 * Remove a parameter by $key from the query of the $url
 *
 * @param string|array $keys
 * @param null|string|array $url
 * @return string
 */
function url_query_remove($keys, $url = null) : string
{
    return URL::queryRemove($url, $keys);
}

/**
 * Set the $url path part to $data
 *
 * @param string|array $data
 * @param null|string|array $url
 * @return string
 */
function url_query_set($data, $url = null) : string
{
    return URL::querySet($url, $data);
}

/**
 * Get or $set the scheme of a $url
 *
 * @param null|string|array $url
 * @param boolean $set
 * @return string
 */
function url_scheme($url = null, $set = false) : string
{
    return URL::scheme($url, $set);
}

/**
 * Set $scheme part of a $url
 *
 * @param string $scheme
 * @param null|string|array $url
 * @return string
 */
function url_scheme_set(string $scheme, $url = null) : string
{
    return URL::schemeSet($url, $scheme);
}

/**
 * Get the user part of a $url
 *
 * @param null|string|array $url
 * @param false|string $set
 * @return string
 */
function url_user($url = null, $set = false) : string
{
    return URL::user($url, $set);
}

/**
 * Get an array of words from $string
 *
 * @param string $string
 * @param bool $unique
 * @return array
 */
function words(string $string, bool $unique = true) : array
{
    return Str::words($string, $unique);
}
