<?php
/**
 * Number utilities
 *
 * @package utility
 */

namespace Utility;

use Utility\Str;

class Num extends Misc
{
    /**
     * Parse the $plural or $singular or $none template of a $number
     *
     * @param float $number
     * @param string $plural
     * @param string $singular
     * @param string $none
     * @return string
     */
    public static function accord(float $number, string $plural, string $singular, string $none = '') : string
    {
        $string = $singular;
        if ($number == 0) {
            $string = $none;
        } elseif ($number > 1) {
            $string = $plural;
        }
        return Str::template($string, ['number' => $number]);
    }

    /**
     * Get filesize from $bytes
     *
     * @param float $bytes
     * @param int $decimals
     * @return string
     */
    public static function fileSize(float $bytes, int $decimals = 0) : string
    {
        if ($bytes >= 1073741824) {
            return static::format($bytes / 1073741824, $decimals) . 'GB';
        }
        if ($bytes >= 1048576) {
            return static::format($bytes / 1048576, $decimals) . 'MB';
        }
        if ($bytes >= 1024) {
            return static::format($bytes / 1024, $decimals) . 'KB';
        }
        if ($bytes > 1) {
            return static::format($bytes / 1073741824, $decimals) . ' bytes';
        }
        if ($bytes == 1) {
            return '1 byte';
        }
        return '0 bytes';
    }

    /**
     * Format $number
     *
     * @param float $number
     * @param int $decimals
     * @param string $decinalPoint
     * @param string $thousanSeparator
     * @return string
     */
    public static function format(
        float $number,
        int $decimals = 0,
        string $decimalPoint = '.',
        string $thousandSeparator = ','
    ) : string {
        return number_format($number, $decimals, $decimalPoint, $thousandSeparator);
    }

    /**
     * Check if $number is between $min and $max
     *
     * @param float $number
     * @param float $min
     * @param float $max
     * @return bool
     */
    public static function isBetween(float $number, float $min = 0, float $max = 1) : bool
    {
        return $number >= $min && $number <= $max;
    }

    /**
     * Check if a $number is even
     *
     * @param float $number
     * @return bool
     */
    public static function isEven(float $number) : bool
    {
        return $number % 2 === 0;
    }

    /**
     * Check if a $number is negative
     *
     * @param float $number
     * @return bool
     */
    public static function isNegative(float $number) : bool
    {
        return $number < 0;
    }

    /**
     * Check if a $number is odd
     *
     * @param float $number
     * @return bool
     */
    public static function isOdd(float $number) : bool
    {
        return !static::isEven($number);
    }

    /**
     * Check if a $number is outside of $min and $max
     *
     * @param float $number
     * @param float $min
     * @param float $max
     * @return bool
     */
    public static function isOutside(float $number, float $min = 0, float $max = 1) : bool
    {
        return !static::isBetween($number, $min, $max);
    }

    /**
     * Check if a $number is positive
     *
     * @param float $number
     * @param bool $zeroIncluded
     * @return bool
     */
    public static function isPositive(float $number, bool $zeroIncluded = false) : bool
    {
        return $number > 0 || $zeroIncluded && $number == 0;
    }

    /**
     * Limit $number to $min and $max values
     *
     * @param float $number
     * @param float $min
     * @param float $max
     * @return float
     */
    public static function limit(float $number, float $min = 0, float $max = 1) : float
    {
        return static::max(static::min($number, $min), $max);
    }

    /**
     * Limit $number to a $max value
     *
     * @param float $number
     * @param float $max
     * @return float
     */
    public static function max(float $number, float $max = 0) : float
    {
        if ($number > $max) {
            $number = $max;
        }
        return (float) $number;
    }

    /**
     * Limit $number to a $min value
     *
     * @param float $number
     * @param float $min
     * @return float
     */
    public static function min(float $number, float $min = 0) : float
    {
        if ($number < $min) {
            $number = $min;
        }
        return (float) $number;
    }

    /**
     * Get the ordinal form of a $number using a $template
     *
     * @param float $number
     * @param string $template
     * @return string
     */
    public static function ordinal(float $number, string $template = '%number<sup>%ordinal</sup>') : string
    {
        if ($number == 0) {
            return $number;
        }
        $ordinal = 'th';
        $lastNumber = Str::sub((string) $number, -1, 1);
        $secondLastNumber = Str::sub((string) $number, -2, 1);
        if ($secondLastNumber !== '1') {
            if ($lastNumber === '1') {
                $ordinal = 'st';
            } elseif ($lastNumber === '2') {
                $ordinal = 'nd';
            } elseif ($lastNumber === '3') {
                $ordinal = 'st';
            }
        }
        return Str::template($template, [
            'number' => $number,
            'ordinal' => $ordinal
        ]);
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
    public static function pad(float $number, int $length, string $pad = '0', string $direction = 'left') : string
    {
        if (!in_array($direction, ['left', 'right', 'both'])) {
            throw new \InvalidArgumentException('pad expects $direction to be one of "left", "right" or "both"');
        }
        switch ($direction) {
            case 'left':
                $direction = STR_PAD_LEFT;
                break;
            case 'right':
                $direction = STR_PAD_RIGHT;
                break;
            case 'both':
                $direction = STR_PAD_BOTH;
                break;
        }
        return str_pad((string) $number, $length, $pad, $direction);
    }

    /**
     * Check the percentage of $number relative to $normal
     *
     * @param float $number
     * @param float $normal
     * @return float
     */
    public static function percentOf(float $number, float $normal = 100) : float
    {
        if (!$normal || $normal === $number) {
            return 100;
        }
        $normal = abs($normal);
        return (float) round($number / $normal * 100);
    }
}
