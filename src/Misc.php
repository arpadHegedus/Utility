<?php
/**
 * Miscellaneous utilities
 *
 * @package utility
 */

namespace Utility;

use Utility\Func;

class Misc
{
    public static $dumpCSS = '<style>
            pre.dump {
                display: block !important;
                max-width: 100% !important;
                overflow: hidden !important;
                overflow-x: auto !important;
                padding: 15px !important;
                border: 1px solid #ccc !important;
                background: #f5f5f5 !important;
                color: #333 !important;
                font: 15px/1.5 400 Consolas, "Courier New", monospace !important;
            }
            pre.dump .comment { color: #aaa !important }
            pre.dump .raw { color: blue !important }
            pre.dump .class { color: darkturquoise !important }
            pre.dump .function { color: mediumblue !important }
            pre.dump .string { color: darkorange !important }
            pre.dump .number { color: limegreen !important }
            pre.dump .variable { color: mediumorchid !important }
        </style>';
    public static $dumpTabSpace = 4;

    /**
     * Check if $data abides an array of $rules
     *
     * @param mixed $data
     * @param array|callable $rules
     * @return bool
     */
    public static function abides($data, $rules = []) : bool
    {
        if (empty($rules)) {
            return true;
        }
        if (is_string($rules) || is_callable($rules)) {
            $rules = [$rules];
        }
        foreach ($rules as $rule) {
            if (is_callable($rule) && !$rule($data)) {
                return false;
            }
            if (!is_callable($rule) && $rule !== $data) {
                return false;
            }
        }
        return true;
    }

    /**
     * Check if $data abides any of an array of $rules
     *
     * @param mixed $data
     * @param string|array|callable $rules
     * @return bool
     */
    public static function abidesAny($data, $rules = []) : bool
    {
        if (empty($rules)) {
            return true;
        }
        if (is_string($rules) || is_callable($rules)) {
            $rules = [$rules];
        }
        foreach ($rules as $rule) {
            if (is_callable($rule) && $rule($data)) {
                return true;
            }
            if (!is_callable($rule) && $rule === $data) {
                return true;
            }
        }
        return false;
    }

    /**
     * Add mixed $data to other mixed data cleverly
     *
     * @param mixed ...$data
     * @return mixed
     */
    public static function add(...$data)
    {
        if (empty($data)) {
            return [];
        }
        $return = array_shift($data);
        $from = static::getShallowType($return);
        foreach ($data as $datum) {
            $to = static::getShallowType($datum);
            if ($from === 'boolean') {
                $return = $datum;
            } elseif ($from !== 'array' && $to === 'boolean') {
                $return = $datum === false ? false : $return;
            } elseif ($from === 'number' && $to === 'number') {
                $return = (float) $return + (float) $datum;
            } elseif (in_array($from, ['string', 'number']) && in_array($to, ['string', 'number'])) {
                $return .= $datum;
            } elseif ($from === 'array' && $to === 'array' || $to === 'object') {
                foreach ((array) $datum as $key => $value) {
                    if (is_int($key)) {
                        $return[] = $value;
                    } else {
                        $newValue = isset($return[$key]) ? static::add($return[$key], $value) : $value;
                        $return[$key] = $newValue;
                    }
                }
            } elseif ($from === 'object' && $to === 'array') {
                foreach ($datum as $key => $value) {
                    if (!is_int($key)) {
                        $propertyExists = property_exists(get_class($return), $key);
                        $newValue = $propertyExists ? static::add($return->$key, $value) : $value;
                        $return->$key = $newValue;
                    }
                }
            } elseif ($from === 'array') {
                $return[] = $datum;
            } else {
                $return = $datum;
            }
        }
        return $return;
    }

    /**
     * Dump $data and die
     *
     * @param mixed ...$data
     * @return void
     */
    public static function dd(...$data) : void
    {
        static::dump(...$data);
        die;
    }

    /**
     * Dry dump $data for debug
     *
     * @param mixed ...$data
     * @return void
     */
    public static function dump(...$data) : void
    {
        foreach ($data as $datum) {
            Func::once(function () {
                echo static::$dumpCSS;
            })();
            echo '<pre class="dump">';
            echo static::doDump($datum);
            echo '</pre>';
        }
    }

    /**
     * Merge mixed $data to other mixed data cleverly
     *
     * @param mixed ...$data
     * @return mixed
     */
    public static function merge(...$data)
    {
        if (empty($data)) {
            return [];
        }
        $return = array_shift($data);
        $from = static::getShallowType($return);
        foreach ($data as $datum) {
            $to = static::getShallowType($datum);
            if ($from === 'boolean') {
                $return = $datum;
            } elseif ($to === 'boolean') {
                $return = $datum === false ? false : $return;
            } elseif ($from === 'number' && $to === 'number') {
                $return = (float) $return + (float) $datum;
            } elseif (in_array($from, ['string', 'number']) && in_array($to, ['string', 'number'])) {
                $return .= $datum;
            } elseif ($from === 'object' && in_array($to, ['array', 'object'])) {
                foreach ($datum as $key => $value) {
                    if (!is_int($key)) {
                        if ((is_object($return->{$key}) || is_array($return->{$key})) &&
                            (is_object($value) || is_array($value))
                        ) {
                            $return->{$key} = static::merge($return->{$key}, $value);
                        } else {
                            $return->{$key} = $value;
                        }
                    }
                }
            } elseif ($from === 'array' && $to === 'object') {
                foreach ($datum as $key => $value) {
                    if ((is_object($return[$key]) || is_array($return[$key])) &&
                        (is_object($value) || is_array($value))
                    ) {
                        $return[$key] = static::merge($return[$key], $value);
                    } else {
                        $return[$key] = $value;
                    }
                }
            } elseif ($from === 'array' && $to == 'array') {
                foreach ($datum as $key => $value) {
                    if (is_int($key)) {
                        $return[] = $value;
                    } else {
                        if (isset($return[$key]) &&
                            (is_object($return[$key]) || is_array($return[$key])) &&
                            (is_object($value) || is_array($value))
                        ) {
                            $return[$key] = static::merge($return[$key], $value);
                        } else {
                            $return[$key] = $value;
                        }
                    }
                }
            } else {
                $return = $datum;
            }
        }
        return $return;
    }

    /**
     * Get a simplified type of a variable.
     * Return values: string|array|object|number|boolean|unknown
     *
     * @param mixed $data
     * @return string
     */
    public static function getShallowType($data) : string
    {
        $type = gettype($data);
        if (in_array($type, ['integer', 'double', 'float']) || $type === 'string' && is_numeric($data)) {
            $type = 'number';
        }
        if ($type === 'NULL') {
            $type = 'boolean';
        }
        if (in_array($type, ['unknown type', 'resouce', 'resource (closed)'])) {
            $type = 'unknown';
        }
        return $type;
    }

    /**
     * Run dump type output
     *
     * @param mixed $data
     * @param int   $depth
     * @param bool  $typeComment
     * @return string
     */
    protected static function doDump($data, int $depth = 0, bool $typeComment = true) : string
    {
        $return = '';
        $type = gettype($data);
        if ($type === 'double') {
            $type = 'float';
        }
        $indent = str_pad('', static::$dumpTabSpace * $depth, ' ');
        $oneIndent = str_pad('', static::$dumpTabSpace, ' ');
        if ($typeComment) {
            $return .= $indent . '<span class="comment">/* ';
            $return .= strtoupper($type);
            $return .= ' */</span>';
            $return .= PHP_EOL;
        }
        if (!is_callable($data) && is_object($data)) {
            $class = get_class($data);
            $properties = array_keys(get_class_vars($class));
            $return .= "<span class=\"class\">$class</span> ";
            $return .= '{';
            $return .= PHP_EOL;
            foreach ($properties as $property) {
                $return .= $indent . $oneIndent . "<span class=\"variable\">$$property</span>";
                $value = isset($class::$$property) ? $class::$$property : $data->$property;
                $return .= ' = ';
                $return .= static::doDump($value, $depth + 1, false);
                $return .= ',';
                $return .= PHP_EOL;
            }
            $methods = get_class_methods(get_class($data));
            foreach ($methods as $method) {
                $return .= $indent . $oneIndent;
                $return .= '<span class="function">';
                $return .= $method;
                $return .= '()</span>';
                $return .= ',';
                $return .= PHP_EOL;
            }
            $return .= $indent . '}';
        } elseif (is_array($data)) {
            $return .= '[';
            if (!empty($data)) {
                $return .= PHP_EOL;
                foreach ($data as $key => $value) {
                    $keyClass = is_int($key) ? 'number' : 'string';
                    $key = $keyClass === 'string' ? "'$key'" : $key;
                    $return .= $indent . $oneIndent . "<span class=\"$keyClass\">$key</span>";
                    $return .= ' => ';
                    $return .= static::doDump($value, $depth + 1, false);
                    $return .= ',';
                    $return .= PHP_EOL;
                }
                $return .= $indent;
            }
            $return .= ']';
        } elseif (is_string($data)) {
            $quote = strstr($data, "'") ? '"' : "'";
            if (strstr($data, PHP_EOL)) {
                $quote = '"';
            }
            $return .= '<span class="string">';
            $return .= $quote;
            $return .= htmlentities(str_replace([
                $quote,
                PHP_EOL
            ], [
                '\\' . $quote,
                '\\n'
            ], $data));
            $return .= $quote;
            $return .= '</span>';
        } elseif (is_numeric($data)) {
            $return .= '<span class="number">';
            $return .= $data;
            $return .= '</span>';
        } else {
            $class = 'raw';
            if (is_callable($data)) {
                $class = 'function';
                $data = 'function()';
            } elseif ($data === true) {
                $data = 'true';
            } elseif ($data === false) {
                $data = 'false';
            } elseif ($data === null) {
                $data = 'null';
            }
            $return .= "<span class=\"$class\">";
            $return .= $data;
            $return .= '</span>';
        }
        return $return;
    }
}
