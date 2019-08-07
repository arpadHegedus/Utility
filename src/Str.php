<?php
/**
 * String utilities
 *
 * @package utility
 */

namespace Utility;

use Utility\Num;

class Str extends Misc
{
    /**
     * Character map for ASCII conversions
     *
     * @var array
     */
    public static $characterMap;

    /**
     * Language-specific character map for ASCII conversions
     *
     * @var array
     */
    public static $characterMapLanguage;

    /**
     * Character map for generating strings
     *
     * @var array
     */
    public static $characterMapRandom;

    /**
     * Character map for generating strings with specific consonant and vowel separation
     *
     * @var array
     */
    public static $characterMapRandomReadable;

    /**
     * Default encoding
     *
     * @var string
     */
    public static $encoding;

    /**
     * False values for boolean conversions
     *
     * @var array
     */
    public static $falseValues;

    /**
     * Default regex encoding
     *
     * @var string
     */
    public static $regexEncoding;

    /**
     * Default ignored words list for titlize
     *
     * @var array
     */
    public static $titlizeIgnores;

    /**
     * True values for boolean conversions
     *
     * @var array
     */
    public static $trueValues;

    /**
     * Get $plural or $singular string depending on $number
     *
     * @param string|float $number
     * @param string $plural
     * @param string $singular
     * @param string $none
     * @return string
     */
    public static function accord($number, string $plural, string $singular, string $none = '') : string
    {
        return Num::accord((float) $number, $plural, $singular, $none);
    }

    /**
     * Convert a $string to alpha
     *
     * @param string $string
     * @return string
     */
    public static function alpha(string $string) : string
    {
        return preg_replace('/[^[:alpha:]]/mi', '', $string);
    }

    /**
     * Convert a $string to alpha numeric
     *
     * @param string $string
     * @return string
     */
    public static function alphaNumeric(string $string) : string
    {
        return preg_replace('/[^[:alnum:]]/mi', '', $string);
    }

    /**
     * Add $append to $string at the end
     *
     * @param string $string
     * @param string $append
     * @return string
     */
    public static function append(string $string, string $append) : string
    {
        return $string . $append;
    }

    /**
     * Convert a $string to ASCII removing all accents
     *
     * @param string $string
     * @param string $language
     * @param bool $removeUnsupported
     * @return string
     */
    public static function ascii(string $string, $language = 'en', $removeUnsupported = true) : string
    {
        $characterMapLanguage = static::getCharacterMapForLanguage($language);
        if (!empty($characterMapLanguage)) {
            $string = str_replace($characterMapLanguage[0], $characterMapLanguage[1], $string);
        }
        foreach (static::getCharacterMap() as $key => $value) {
            $string = str_replace($value, $key, $string);
        }
        if ($removeUnsupported) {
            $string = preg_replace('/[^\x20-\x7E]/u', '', $string);
        }
        return $string;
    }

    /**
     * Get character at a specific $index from a $string
     *
     * @param string $string
     * @param int $index
     * @param null|string $encoding
     * @return string
     */
    public static function at(string $string, int $index, $encoding = null) : string
    {
        return static::sub($string, $index, 1, $encoding);
    }

    /**
     * Base 64 encode a $string
     *
     * @param string $string
     * @return string
     */
    public static function base64(string $string) : string
    {
        return (string) base64_encode($string);
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
    public static function between(
        string $string,
        string $start,
        string $end,
        int $offset = 0,
        $encoding = null
    ) : string {
        $startIndex = static::index($string, $start, $offset, $encoding);
        $endIndex = static::index($string, $end, $startIndex ?? 0, $encoding);
        if ($startIndex === false || $endIndex === false) {
            return '';
        }
        $length = $startIndex + static::length($start, $encoding);
        return static::sub($string, $length, $endIndex - $length, $encoding);
    }

    /**
     * Convert a $string to a bool
     *
     * @param string $string
     * @param array $trueValues
     * @param array $falseValues
     * @return bool
     */
    public static function bool(string $string, array $trueValues = [], array $falseValues = []) : bool
    {
        $trueValues = empty($trueValues) ? static::getTrueValues() : $trueValues;
        $falseValues = empty($falseValues) ? static::getFalseValues() : $falseValues;
        $key = static::trim(static::lower($string));
        if (in_array($key, $trueValues)) {
            return true;
        }
        if (in_array($key, $falseValues)) {
            return false;
        }
        if (is_numeric($string)) {
            return intval($string) > 0;
        }
        return (bool) static::stripWhitespace($string);
    }

    /**
     * Convert a $string to camelCase using a specific $language
     *
     * @param string $string
     * @param string $language
     * @return string
     */
    public static function camel(string $string, $language = '') : string
    {
        $string = static::slugify($string, '-', $language);
        $array = explode('-', $string);
        foreach ($array as $key => &$value) {
            if ($key > 0) {
                $value = static::upperFirst($value);
            }
        }
        return implode('', $array);
    }

    /**
     * Get all distinct characters of a $string as an array
     *
     * @param string $string
     * @param null|string $encoding
     * @return array
     */
    public static function chars(string $string, $encoding = null) : array
    {
        $encoding = $encoding ?? static::getEncoding();
        $chars = [];
        for ($i = 0, $l = mb_strlen($string, $encoding); $i < $l; $i++) {
            $chars[static::at($string, $i)] = true;
        }
        return array_keys($chars);
    }

    /**
     * Normalize and trim a $string
     *
     * @param string $string
     * @return string
     */
    public static function clean(string $string) : string
    {
        $string = static::normalize($string);
        $string = static::trim($string);
        return $string;
    }

    /**
     * Ensure all white space characters only appear once in a $string
     *
     * @param string $string
     * @return string
     */
    public static function collapse(string $string) : string
    {
        $string = str_replace("&nbsp;", " ", $string);
        $string = static::regexReplace($string, '/[[:space:]|]+/mi', ' ');
        $string = static::trim($string);
        return $string;
    }

    /**
     * Find a common sub string from $string and $otherString
     *
     * @param string $string
     * @param string $otherString
     * @param null|string $encoding
     * @return string
     */
    public static function common(string $string, string $otherString, $encoding = null) : string
    {
        $stringLength = static::length($string, $encoding);
        $otherLength = static::length($otherString, $encoding);
        if ($stringLength == 0 || $otherLength == 0) {
            return '';
        }
        $length = 0;
        $end = 0;
        $table = array_fill(0, $stringLength + 1, array_fill(0, $otherLength + 1, 0));
        for ($i = 1; $i <= $stringLength; $i++) {
            for ($j = 1; $j <= $otherLength; $j++) {
                $stringCharacter = static::sub($string, $i - 1, 1, $encoding);
                $otherCharacter = static::sub($otherString, $j - 1, 1, $encoding);
                if ($stringCharacter == $otherCharacter) {
                    $table[$i][$j] = $table[$i - 1][$j - 1] + 1;
                    if ($table[$i][$j] > $length) {
                        $length = $table[$i][$j];
                        $end = $i;
                    }
                } else {
                    $table[$i][$j] = 0;
                }
            }
        }
        return static::sub($string, $end - $length, $length, $encoding);
    }

    /**
     * Find a common prefix from $string and $otherString
     *
     * @param string $string
     * @param string $otherString
     * @param null|string $encoding
     * @return string
     */
    public static function commonPrefix(string $string, string $otherString, $encoding = null) : string
    {
        $encoding = $encoding ?? static::getEncoding();
        $maxLength = min(static::length($string, $encoding), static::length($otherString, $encoding));
        $commonPrefix = '';
        for ($i = 0; $i < $maxLength; $i++) {
            $character = mb_substr($string, $i, 1, $encoding);
            if ($character == mb_substr($otherString, $i, 1, $encoding)) {
                $commonPrefix .= $character;
            } else {
                break;
            }
        }
        return $commonPrefix;
    }

    /**
     * Find a common suffix from $string and $otherString
     *
     * @param string $string
     * @param string $otherString
     * @param null|string $encoding
     * @return string
     */
    public static function commonSuffix(string $string, string $otherString, $encoding = null) : string
    {
        $encoding = $encoding ?? static::getEncoding();
        $maxLength = min(static::length($string, $encoding), static::length($otherString, $encoding));
        $commonSuffix = '';
        for ($i = 1; $i <= $maxLength; $i++) {
            $character = mb_substr($string, -$i, 1, $encoding);
            if ($character == mb_substr($otherString, -$i, 1, $encoding)) {
                $commonSuffix = $character . $commonSuffix;
            } else {
                break;
            }
        }
        return $commonSuffix;
    }

    /**
     * Check if $string contains $needle
     *
     * @param string $string
     * @param string $needle
     * @param bool $caseSensitive
     * @param null|string $encoding
     * @return bool
     */
    public static function contains(
        string $string,
        string $needle,
        bool $caseSensitive = false,
        $encoding = null
    ) : bool {
        $encoding = $encoding ?? static::getEncoding();
        if ($caseSensitive) {
            return mb_strpos($string, $needle, 0, $encoding) !== false;
        } else {
            return mb_stripos($string, $needle, 0, $encoding) !== false;
        }
    }

    /**
     * Check if $string contains all substrings in a $needles array
     *
     * @param string $string
     * @param array $needles
     * @param bool $caseSensitive
     * @param null|string $encoding
     * @return bool
     */
    public static function containsAll(
        string $string,
        array $needles,
        bool $caseSensitive = false,
        $encoding = null
    ) : bool {
        if (empty($needles)) {
            return false;
        }
        foreach ($needles as $needle) {
            if (!static::contains($string, $needle, $caseSensitive, $encoding)) {
                return false;
            }
        }
        return true;
    }

    /**
     * Check if $string contains any substrings in a $needles array
     *
     * @param string $string
     * @param array $needles
     * @param bool $caseSensitive
     * @param null|string $encoding
     * @return bool
     */
    public static function containsAny(
        string $string,
        array $needles,
        bool $caseSensitive = false,
        $encoding = null
    ) : bool {
        if (empty($needles)) {
            return false;
        }
        foreach ($needles as $needle) {
            if (static::contains($string, $needle, $caseSensitive, $encoding)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Count the characters in $string
     *
     * @param string $string
     * @param null|string $encoding
     * @return int
     */
    public static function count(string $string, $encoding = null) : int
    {
        return static::length($string, $encoding);
    }

    /**
     * Delimit $string with dashes instead of spaces
     *
     * @param string $string
     * @return string
     */
    public static function dashed(string $string) : string
    {
        return static::delimit($string, '-');
    }

    /**
     * Connect words with $delimiter instead of spaces in $string
     *
     * @param string $string
     * @param string $delimiter
     * @param null|string $encoding
     * @return string
     */
    public static function delimit(string $string, string $delimiter, $encoding = null) : string
    {
        $encoding = $encoding ?? static::getEncoding();
        $string = static::trim($string);
        $string = static::regexReplace($string, '/\B([A-Z])/', '-\1');
        $string = static::regexReplace($string, '/[-_\s]+/mui', $delimiter);
        return $string;
    }

    /**
     * Check if $string ends with $needle
     *
     * @param string $string
     * @param string $needle
     * @param bool $caseSensitive
     * @param null|string $encoding
     * @return bool
     */
    public static function endsWith(
        string $string,
        string $needle,
        bool $caseSensitive = false,
        $encoding = null
    ) : bool {
        $encoding = $encoding ?? static::getEncoding();
        $needleLength = mb_strlen($needle, $encoding);
        $stringLength = mb_strlen($string, $encoding);
        $endOfString = mb_substr($string, $stringLength - $needleLength, $needleLength, $encoding);
        if (!$caseSensitive) {
            $needle = mb_strtolower($needle, $encoding);
            $endOfString = mb_strtolower($endOfString, $encoding);
        }
        return $needle == $endOfString;
    }

    /**
     * Check if $string ends with any of the $needles
     *
     * @param string $string
     * @param array $needles
     * @param bool $caseSensitive
     * @param null|string $encoding
     * @return bool
     */
    public static function endsWithAny(
        string $string,
        array $needles,
        bool $caseSensitive = false,
        $encoding = null
    ) : bool {
        if (empty($needles)) {
            return false;
        }
        foreach ($needles as $needle) {
            if (static::endsWith($string, $needle, $caseSensitive, $encoding)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Esnure $string starts with $ensure
     *
     * @param string $string
     * @param string $ensure
     * @return string
     */
    public static function ensureLeft(string $string, string $ensure) : string
    {
        if (!static::startsWith($string, $ensure)) {
            $string = $ensure . $string;
        }
        return $string;
    }

    /**
     * Ensure $string ends with $ensure
     *
     * @param string $string
     * @param string $ensure
     * @return string
     */
    public static function ensureRight(string $string, string $ensure) : string
    {
        if (!static::endsWith($string, $ensure)) {
            $string .= $ensure;
        }
        return $string;
    }

    /**
     * Return a formatted filesize from $bytes
     *
     * @param float|string $bytes
     * @param integer $decimals
     * @return string
     */
    public static function fileSize($bytes, int $decimals = 0) : string
    {
        return Num::fileSize((float) $bytes, $decimals);
    }

    /**
     * Get first $number characters from $string
     *
     * @param string $string
     * @param int $number
     * @param null|string $encoding
     * @return string
     */
    public static function first(string $string, int $number = 1, $encoding = null) : string
    {
        if ($number <= 0) {
            return '';
        }
        return static::sub($string, 0, $number, $encoding);
    }

    /**
     * HTML decode $string
     *
     * @param string $string
     * @param string $flags
     * @param null|string $encoding
     * @return string
     */
    public static function htmlDecode(string $string, $flags = ENT_COMPAT, $encoding = null) : string
    {
        $encoding = $encoding ?? static::getEncoding();
        return html_entity_decode($string, $flags, $encoding);
    }

    /**
     * HTML encode $string
     *
     * @param string $string
     * @param string $flags
     * @param null|string $encoding
     * @return string
     */
    public static function htmlEncode(string $string, $flags = ENT_COMPAT, $encoding = null) : string
    {
        $encoding = $encoding ?? static::getEncoding();
        return htmlentities($string, $flags, $encoding);
    }

    /**
     * Get position of $needle within $string
     *
     * @param string $string
     * @param string $needle
     * @param int $offset
     * @param null|string $encoding
     * @return int
     */
    public static function index(string $string, string $needle, int $offset = 0, $encoding = null) : int
    {
        $encoding = $encoding ?? static::getEncoding();
        return mb_strpos($string, $needle, $offset, $encoding);
    }

    /**
     * Get all positions of $needle within $string
     *
     * @param string $string
     * @param string $needle
     * @param null|string $encoding
     * @return array
     */
    public static function indexes(string $string, string $needle, $encoding = null) : array
    {
        $encoding = $encoding ?? static::getEncoding();
        $indexes = [];
        $offset = 0;
        while ($offset !== null) {
            $offset = static::index($string, $needle, $offset, $encoding);
            if (in_array($offset, $indexes)) {
                $offset = null;
            } else {
                $indexes[] = $offset;
                $offset += static::length($needle, $encoding);
            }
        }
        return $indexes;
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
    public static function insert(string $string, string $insert, int $index = 0, $encoding = null) : string
    {
        $encoding = $encoding ?? static::getEncoding();
        if ($index > static::length($string, $encoding)) {
            return $string . $insert;
        }
        $start = mb_substr($string, 0, $index, $encoding);
        $end = mb_substr($string, $index, static::length($string, $encoding), $encoding);
        return $start . $insert . $end;
    }

    /**
     * Check if $string is alfa
     *
     * @param string $string
     * @return bool
     */
    public static function isAlpha(string $string) : bool
    {
        return static::matches($string, '/^[[:alpha:]]+$/miu');
    }

    /**
     * Check if $string is alfa numeric
     *
     * @param string $string
     * @return bool
     */
    public static function isAlphanumeric(string $string) : bool
    {
        return static::matches($string, '/^[[:alnum:]]+$/miu');
    }

    /**
     * Check if $string is base 64 encoded
     *
     * @param string $string
     * @return bool
     */
    public static function isBase64(string $string) : bool
    {
        return (base64_encode(base64_decode($string, true)) === $string);
    }

    /**
     * Check if $string is empty or has only white space
     *
     * @param string $string
     * @return bool
     */
    public static function isBlank(string $string) : bool
    {
        return static::matches($string, '/^[[:space:]]*$/mi');
    }

    /**
     * Check if $string is a valid email
     *
     * @param string $string
     * @return bool
     */
    public static function isEmail(string $string) : bool
    {
        return filter_var($string, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * Check if $string is hexadecimal
     *
     * @param string $string
     * @return bool
     */
    public static function isHexadecimal(string $string) : bool
    {
        return static::matches($string, '/^[[:xdigit:]]*$/mi');
    }

    /**
     * Check if $string contains HTML code
     *
     * @param string $string
     * @return bool
     */
    public static function isHTML(string $string) : bool
    {
        return $string !== strip_tags($string);
    }

    /**
     * Check if $string is a valid IP address
     *
     * @param string $string
     * @return bool
     */
    public static function isIP(string $string) : bool
    {
        return filter_var($string, FILTER_VALIDATE_IP) !== false;
    }

    /**
     * Check if $string is valid JSON
     *
     * @param string $string
     * @return bool
     */
    public static function isJSON(string $string) : bool
    {
        if (!static::length($string)) {
            return false;
        }
        json_decode($string);
        return (json_last_error() === JSON_ERROR_NONE);
    }

    /**
     * Check if $string is lower-case
     *
     * @param string $string
     * @return bool
     */
    public static function isLower(string $string) : bool
    {
        return $string == static::lower($string);
    }

    /**
     * Check if $string is a valid regex
     *
     * @param string $pattern
     * @return bool
     */
    public static function isRegex(string $pattern) : bool
    {
        return @preg_match($pattern, null) !== false;
    }

    /**
     * Check if $string is serialized
     *
     * @param string $string
     * @return bool
     */
    public static function isSerialized(string $string) : bool
    {
        return $string === 'b:0;' || @unserialize($string) !== false;
    }

    /**
     * Check if $string is upper case
     *
     * @param string $string
     * @return bool
     */
    public static function isUpper(string $string) : bool
    {
        return $string == static::upper($string);
    }

    /**
     * Check if $string is a valid URL
     *
     * @param string $string
     * @return bool
     */
    public static function isURL(string $string) : bool
    {
        return filter_var($string, FILTER_VALIDATE_URL) !== false;
    }

    /**
     * Get the last $number characters of a $string
     *
     * @param string $string
     * @param int $number
     * @param null|string $encoding
     * @return string
     */
    public static function last(string $string, int $number = 1, $encoding = null) : string
    {
        if ($number <= 0) {
            return '';
        }
        return static::sub($string, -$number, null, $encoding);
    }

    /**
     * Get last position of $needle in $string
     *
     * @param string $string
     * @param string $needle
     * @param int $offset
     * @param null|string $encoding
     * @return int
     */
    public static function lastIndex(string $string, string $needle, int $offset = 0, $encoding = null) : int
    {
        $encoding = $encoding ?? static::getEncoding();
        return mb_strrpos($string, $needle, $offset, $encoding);
    }

    /**
     * Count length of $string
     *
     * @param string $string
     * @param null|string $encoding
     * @return int
     */
    public static function length(string $string, $encoding = null) : int
    {
        $encoding = $encoding ?? static::getEncoding();
        return mb_strlen($string, $encoding);
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
    public static function limit(string $string, int $length, string $append = '...', $encoding = null) : string
    {
        $encoding = $encoding ?? static::getEncoding();
        $string = static::collapse($string);
        $string = str_replace(['<', '>'], [' <', '> '], $string);
        $string = strip_tags($string);
        $string = preg_replace('/[[:space:]]+/', ' ', $string);
        $string = static::trim($string);
        $return = mb_substr($string, 0, $length, $encoding);
        $lastSpace = mb_strrpos($return, ' ', 0, $encoding);
        if ($lastSpace !== false && $string !== $return) {
            $return = mb_substr($return, 0, $lastSpace, $encoding);
        }
        if ($return !== $string) {
            $return = trim($return) . $append;
        }
        return $return;
    }

    /**
     * Limit $string to a $limit of words
     *
     * @param string $string
     * @param int $length
     * @return string
     */
    public static function limitWords(string $string, int $length, string $append = '...')
    {
        $string = static::collapse($string);
        $string = str_replace(['<', '>'], [' <', '> '], $string);
        $string = strip_tags($string);
        $string = preg_replace('/[[:space:]]+/', ' ', $string);
        $string = static::trim($string);
        $array = static::split($string, '/[[:space:]]+/');
        $limitedArray = array_slice($array, 0, $length);
        $string = implode(' ', $limitedArray);
        if (count($array) > count($limitedArray)) {
            $string .= $append;
        }
        return $string;
    }

    /**
     * Get an array of lines in $string
     *
     * @param string $string
     * @param bool $trimEachLine
     * @return array
     */
    public static function lines(string $string, bool $trimEachLine = false) : array
    {
        $lines = static::split($string, '/[\r\n]{1,2}/');
        if ($trimEachLine) {
            foreach ($lines as &$line) {
                $line = static::trim($line);
            }
        }
        return $lines;
    }

    /**
     * Convert $string to lower case
     *
     * @param string $string
     * @param null|string $encoding
     * @return string
     */
    public static function lower(string $string, $encoding = null) : string
    {
        $encoding = $encoding ?? static::getEncoding();
        return mb_strtolower($string, $encoding);
    }

    /**
     * Convert the first character of each word in $string to lower case
     *
     * @param string $string
     * @param null|string $encoding
     * @return string
     */
    public static function lowerFirst(string $string, $encoding = null) : string
    {
        $encoding = $encoding ?? static::getEncoding();
        $first = mb_substr($string, 0, 1, $encoding);
        $rest = mb_substr($string, 1, static::length($string) - 1, $encoding);
        return mb_strtolower($first, $encoding) . $rest;
    }

    /**
     * Check if $string matches $pattern
     *
     * @param string $string
     * @param string $pattern
     * @return bool
     */
    public static function matches(string $string, string $pattern) : bool
    {
        return (bool) preg_match($pattern, $string);
    }

    /**
     * Convert punctuation characters to a standardised, simpler version
     *
     * @param string $string
     * @return string
     */
    public static function normalize(string $string) : string
    {
        return preg_replace([
            '\r\n',
            '\r',
            '/\x{2026}/u',
            '/[\x{201C}\x{201D}\x{201E}\x{201F}\x{2033}\x{2034}\x{2036}\x{2037}\x{2057}]/u',
            '/[\x{201A}\x{201B}\x{2018}\x{2019}\x{2032}\x{2035}]/u',
            '/[\{2011}\x{2012}\x{2013}\x{2014}\x{2015}]/u',
            '/[\x{203C}]/u',
            '/[\x{2044}]/u',
            '/[\x{2047}]/u',
            '/[\x{2048}]/u',
            '/[\x{2049}]/u',
            '/[\x{204F}]/u'
        ], [
            '\n',
            '\n',
            '...',
            '"',
            "'",
            '-',
            '!!',
            '/',
            '??',
            '?!',
            '!?',
            ';'
        ], $string);
    }

    /**
     * Get ordinal version of $number according to $template
     *
     * @param string|float $number
     * @param string $template
     * @return string
     */
    public static function ordinal($number, string $template = '%number<sup>%ordinal</sup>') : string
    {
        return Num::ordinal((float) $number, $template);
    }

    /**
     * Add $pad to $string until it reaches $length
     *
     * @param string $string
     * @param int $length
     * @param string $pad
     * @param string $direction
     * @param null|string $encoding
     * @return string
     */
    public static function pad(
        string $string,
        int $length,
        string $pad = ' ',
        string $direction = 'right',
        $encoding = null
    ) : string {
        if (!in_array($direction, ['left', 'right', 'both'])) {
            throw new \InvalidArgumentException('pad expects $direction to be one of "left", "right" or "both"');
        }
        switch ($direction) {
            case 'left':
                return static::padLeft($string, $length, $pad, $encoding);
            case 'right':
                return static::padRight($string, $length, $pad, $encoding);
            default:
                return static::padBoth($string, $length, $pad, $encoding);
        }
    }

    /**
     * Add $pad to both ends of a $string until it reaches $length
     *
     * @param string $string
     * @param int $length
     * @param string $pad
     * @param null|string $encoding
     * @return string
     */
    public static function padBoth(string $string, int $length, string $pad = ' ', $encoding = null) : string
    {
        $padding = $length - static::length($string, $encoding);
        return static::doPad($string, (int) floor($padding / 2), (int) ceil($padding / 2), $pad, $encoding);
    }

    /**
     * Add $pad to the left side of a $string until it reaches $length
     *
     * @param string $string
     * @param int $length
     * @param string $pad
     * @param null|string $encoding
     * @return string
     */
    public static function padLeft(string $string, int $length, string $pad = ' ', $encoding = null) : string
    {
        return static::doPad($string, $length - static::length($string, $encoding), 0, $pad, $encoding);
    }

    /**
     * Add $pad to the right side of a $string until it reaches $length
     *
     * @param string $string
     * @param int $length
     * @param string $pad
     * @param null|string $encoding
     * @return string
     */
    public static function padRight(string $string, int $length, string $pad = ' ', $encoding = null) : string
    {
        return static::doPad($string, 0, $length - static::length($string, $encoding), $pad, $encoding);
    }

    /**
     * Convert $string to PascalCase
     *
     * @param string $string
     * @return string
     */
    public static function pascal(string $string) : string
    {
        $string = static::camel($string);
        return static::upperFirst($string);
    }

    /**
     * Add $prepend at the beginning of $string
     *
     * @param string $string
     * @param string $prepend
     * @return string
     */
    public static function prepend(string $string, string $prepend) : string
    {
        return $prepend . $string;
    }

    /**
     * Generate random or $readable random string of $length
     *
     * @param integer $length
     * @param boolean $readable
     * @return string
     */
    public static function random(int $length = 10, bool $readable = true) : string
    {
        if ($length <= 0) {
            return '';
        }
        $string = '';
        $characterMap = static::getCharacterMapForRandom($readable);
        if ($readable) {
            $consonants = $characterMap['consonants'];
            $vowels = $characterMap['vowels'];
            for ($i = 1; $i <= ($length / 2); $i++) {
                $string .= $consonants[random_int(0, count($consonants) - 1)];
                $string .= $vowels[random_int(0, count($vowels) - 1)];
            }
        } else {
            for ($i = 0; $i < $length; $i++) {
                $string .= $characterMap[random_int(0, count($characterMap) - 1)];
            }
        }
        return $string;
    }

    /**
     * Replace $pattern with $replacement in $string
     *
     * @param string $string
     * @param string|array $pattern
     * @param string|array $replacement
     * @param string $option
     * @return string
     */
    public static function regexReplace(string $string, $pattern, $replacement) : string
    {
        return preg_replace($pattern, $replacement, $string);
    }

    /**
     * Remove $search pattern from $string
     *
     * @param string $string
     * @param string $search
     * @return string
     */
    public static function remove(string $string, string $search) : string
    {
        return static::replace($string, $search, '');
    }

    /**
     * Remove $needle from the beginning of $string
     *
     * @param string $string
     * @param string $needle
     * @param bool $caseSensitive
     * @param null|string $encoding
     * @return string
     */
    public static function removeLeft(
        string $string,
        string $needle,
        bool $caseSensitive = false,
        $encoding = null
    ) : string {
        if (static::startsWith($string, $needle, $caseSensitive, $encoding)) {
            return static::sub($string, static::length($needle, $encoding), null, $encoding);
        }
        return $string;
    }

    /**
     * Remove $needle from the end of $string
     *
     * @param string $string
     * @param string $needle
     * @param bool $caseSensitive
     * @param null|string $encoding
     * @return string
     */
    public static function removeRight(
        string $string,
        string $needle,
        bool $caseSensitive = false,
        $encoding = null
    ) : string {
        if (static::endsWith($string, $needle, $caseSensitive, $encoding)) {
            return static::sub(
                $string,
                0,
                static::length($string, $encoding) - static::length($needle, $encoding),
                $encoding
            );
        }
        return $string;
    }

    /**
     * Repeat $string $times
     *
     * @param string $string
     * @param int $multiplier
     * @return string
     */
    public static function repeat(string $string, int $times) : string
    {
        return str_repeat($string, $times);
    }

    /**
     * Replace $search string with $replacement in $string
     *
     * @param string $string
     * @param string $search
     * @param string $replacement
     * @return string
     */
    public static function replace(string $string, string $search, string $replacement) : string
    {
        if (static::isRegex($search)) {
            return static::regexReplace($string, $search, $replacement);
        } else {
            return static::stringReplace($string, $search, $replacement);
        }
    }

    /**
     * Reverse the characters of $string
     *
     * @param string $string
     * @param null|string $encoding
     * @return string
     */
    public static function reverse(string $string, $encoding = null) : string
    {
        $encoding = $encoding ?? static::getEncoding();
        $return = '';
        for ($i = static::length($string, $encoding); $i >= 0; $i--) {
            $return .= mb_substr($string, $i, 1, $encoding);
        }
        return $return;
    }

    /**
     * Randomly shuffle the characters of $string
     *
     * @param string $string
     * @param null|string $encoding
     * @return string
     */
    public static function shuffle(string $string, $encoding = null) : string
    {
        $indexes = range(0, static::length($string, $encoding) - 1);
        shuffle($indexes);
        $return = '';
        foreach ($indexes as $index) {
            $return .= static::sub($string, $index, 1, $encoding);
        }
        return $return;
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
    public static function slice(string $string, int $start, $end = null, $encoding = null) : string
    {
        if ($end === null) {
            $length = static::length($string, $encoding);
        } elseif ($end >= 0 && $end <= $start) {
            return $string;
        } elseif ($end < 0) {
            $length = static::length($string, $encoding) + $end - $start;
        } else {
            $length = $end - $start;
        }
        return static::sub($string, $start, $length, $encoding);
    }

    /**
     * Convert $string to slug-case
     *
     * @param string $string
     * @param string $language
     * @return string
     */
    public static function slug(string $string, $language = 'en') : string
    {
        return static::slugify($string, '-', $language);
    }

    /**
     * Remove special characters and change whitespace characters with $delimiter in $string
     *
     * @param string $string
     * @param string $delimiter
     * @param string $language
     * @return string
     */
    public static function slugify(string $string, $delimiter = '-', $language = 'en') : string
    {
        $string = static::ascii($string, $language);
        $string = str_replace('@', $delimiter, $string);
        $quotedDelimiter = preg_quote($delimiter);
        $pattern = "/[^a-zA-Z\d\s-_$quotedDelimiter]+/iu";
        $string = preg_replace($pattern, '', $string);
        $string = static::lower($string);
        $string = static::delimit($string, $delimiter);
        $string = static::removeLeft($string, $delimiter);
        $string = static::removeRight($string, $delimiter);
        return $string;
    }

    /**
     * Convert $string to snake_case
     *
     * @param string $string
     * @param string $language
     * @return string
     */
    public static function snake(string $string, $language = 'en') : string
    {
        return static::slugify($string, '_', $language);
    }

    /**
     * Convert spaces to tabs in $string
     *
     * @param string $string
     * @param int $tabLength
     * @return string
     */
    public static function spacesToTabs(string $string, $tabLength = 4) : string
    {
        $spaces = str_repeat(' ', $tabLength);
        return str_replace($spaces, "\t", $string);
    }

    /**
     * Split $string at $pattern
     *
     * @param string $string
     * @param string $pattern
     * @param null|int $limit
     * @return array
     */
    public static function split(string $string, string $pattern = '', $limit = null) : array
    {
        if ($limit === 0) {
            return [];
        }
        if ($pattern === '') {
            return [$string];
        }
        $limit = $limit > 0 ? $limit += 1 : -1;
        $array = preg_split($pattern, $string);
        if ($limit > 0 && count($array) === $limit) {
            array_pop($array);
        }
        return $array;
    }

    /**
     * Check if $string starts with $needle
     *
     * @param string $string
     * @param string $needle
     * @param bool $caseSensitive
     * @param null|string $encoding
     * @return bool
     */
    public static function startsWith(
        string $string,
        string $needle,
        bool $caseSensitive = false,
        $encoding = null
    ) : bool {
        $encoding = $encoding ?? static::getEncoding();
        $needleLength = mb_strlen($needle, $encoding);
        $startOfString = mb_substr($string, 0, $needleLength, $encoding);
        if (!$caseSensitive) {
            $needle = mb_strtolower($needle, $encoding);
            $startOfString = mb_strtolower($startOfString, $encoding);
        }
        return $needle == $startOfString;
    }

    /**
     * Check if $string starts with any $needles
     *
     * @param string $string
     * @param array $needles
     * @param bool $caseSensitive
     * @param null|string $encoding
     * @return bool
     */
    public static function startsWithAny(
        string $string,
        array $needles,
        bool $caseSensitive = false,
        $encoding = null
    ) : bool {
        if (empty($needles)) {
            return false;
        }
        foreach ($needles as $needle) {
            if (static::startsWith($string, $needle, $caseSensitive, $encoding)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Swap $search with $replacement in $string
     *
     * @param string $string
     * @param string $search
     * @param string $replacement
     * @return string
     */
    public static function stringReplace(string $string, string $search, string $replacement) : string
    {
        return str_replace($search, $replacement, $string);
    }

    /**
     * Remove all white space characters from $string
     *
     * @param string $string
     * @return string
     */
    public static function stripWhitespace(string $string) : string
    {
        return static::regexReplace($string, '/[[:space:]]+/mi', '');
    }

    /**
     * Cut $string from $start to a certain $length
     *
     * @param string $string
     * @param int $start
     * @param null|int $length
     * @param null|string $encoding
     * @return string
     */
    public static function sub(string $string, int $start, $length = null, $encoding = null) : string
    {
        $encoding = $encoding ?? static::getEncoding();
        return mb_substr($string, $start, $length, $encoding);
    }

    /**
     * Convert tabs to spaces in $string
     *
     * @param string $string
     * @param int $tabsLength
     * @return array
     */
    public static function tabsToSpaces(string $string, $tabLength = 4) : string
    {
        $spaces = str_repeat(' ', $tabLength);
        return str_replace("\t", $spaces, $string);
    }

    /**
     * Replace template variables in $string according to associate $data array
     *
     * @param string $string
     * @param array $data
     * @param string $varSymbol
     * @return string
     */
    public static function template(string $string, array $data = [], string $varSymbol = '%') : string
    {
        if (static::isBlank($string)) {
            return $string;
        }
        foreach ($data as $key => $value) {
            $string = str_replace($varSymbol . $key, $value, $string);
        }
        return $string;
    }

    /**
     * Count how many times $string contains $needle
     *
     * @param string $string
     * @param string $needle
     * @param bool $caseSensitive
     * @param null|string $encoding
     * @return int
     */
    public static function timesContains(
        string $string,
        string $needle,
        bool $caseSensitive = false,
        $encoding = null
    ) : int {
        $encoding = $encoding ?? static::getEncoding();
        if ($caseSensitive) {
            return mb_substr_count($string, $needle, $encoding);
        }
        $string = mb_strtoupper($string, $encoding);
        $needle = mb_strtoupper($needle, $encoding);
        return mb_substr_count($string, $needle, $encoding);
    }

    /**
     * Convert $string to Title Case
     *
     * @param string $string
     * @param null|string $encoding
     * @return string
     */
    public static function title(string $string, $encoding = null) : string
    {
        $encoding = $encoding ?? static::getEncoding();
        return mb_convert_case($string, MB_CASE_TITLE, $encoding);
    }

    /**
     * Convert $string to Title Case with an $ignore list of words that would not be converted to uppercase
     *
     * @param string $string
     * @param array $ignore
     * @param null|string $encoding
     * @return string
     */
    public static function titlize(string $string, array $ignore = [], $encoding = null) : string
    {
        $encoding = $encoding ?? static::getEncoding();
        $ignore = !empty($ignore) ? $ignore : static::getTitlizeIgnores();
        $string = static::trim($string);
        $string = preg_replace_callback(
            '/([\S]+)/u',
            function ($match) use ($encoding, $ignore) {
                if (in_array($match[0], $ignore)) {
                    return $match[0];
                }
                return Str::upperFirst(Str::lower($match[0], $encoding), $encoding);
            },
            $string
        );
        return static::upperFirst($string);
    }

    /**
     * Trim $characters from each end of a $string
     *
     * @param string $string
     * @param string $characters
     * @return string
     */
    public static function trim(string $string, string $characters = ' ') : string
    {
        $characters = $characters !== ' ' ? preg_quote($characters) : '[:space:]';
        return static::regexReplace($string, "/^[$characters]+|[$characters]+$/mui", '');
    }

    /**
     * Trim $characters from the left side of $string
     *
     * @param string $string
     * @param string $characters
     * @return string
     */
    public static function trimLeft(string $string, string $characters = ' ') : string
    {
        $characters = $characters !== ' ' ? preg_quote($characters) : '[:space:]';
        return static::regexReplace($string, "/^[$characters]+/mui", '');
    }

    /**
     * Trim $characters from the right side of $string
     *
     * @param string $string
     * @param string $characters
     * @return string
     */
    public static function trimRight(string $string, string $characters = ' ') : string
    {
        $characters = $characters !== ' ' ? preg_quote($characters) : '[:space:]';
        return static::regexReplace($string, "/[$characters]+$/mui", '');
    }

    /**
     * Replace spaces with _ (underscores) in $string
     *
     * @param string $string
     * @return string
     */
    public static function underscored(string $string) : string
    {
        return static::delimit($string, '_');
    }

    /**
     * Convert string to UPPER CASE
     *
     * @param string $string
     * @param null|string $encoding
     * @return string
     */
    public static function upper(string $string, $encoding = null) : string
    {
        $encoding = $encoding ?? static::getEncoding();
        return mb_strtoupper($string, $encoding);
    }

    /**
     * Upper Case first character of each word in $string
     *
     * @param string $string
     * @param null|string $encoding
     * @return string
     */
    public static function upperFirst(string $string, $encoding = null) : string
    {
        $encoding = $encoding ?? static::getEncoding();
        $first = mb_substr($string, 0, 1, $encoding);
        $rest = mb_substr($string, 1, static::length($string) - 1, $encoding);
        return mb_strtoupper($first, $encoding) . $rest;
    }

    /**
     * Get an array of words from $string
     *
     * @param string $string
     * @param bool $unique
     * @return array
     */
    public static function words(string $string, bool $unique = true) : array
    {
        $string = static::collapse($string);
        $words = static::split($string, '/[[:space:]]+/');
        if ($unique) {
            $words = array_values(array_unique($words));
        }
        return $words;
    }

    /**
     * Calculate for padding functions
     *
     * @param string $string
     * @param int $left
     * @param int $right
     * @param string $pad
     * @param null|string $encoding
     * @return string
     */
    protected static function doPad(
        string $string,
        int $left = 0,
        int $right = 0,
        string $pad = ' ',
        $encoding = null
    ) : string {
        $padLength = static::length($pad, $encoding);
        $stringLength = static::length($string, $encoding);
        $paddedLength = $stringLength + $left + $right;
        if (!$padLength || $paddedLength <= $stringLength) {
            return $string;
        }
        $leftPad = static::sub(
            static::repeat($pad, (int) ceil($left / $padLength)),
            0,
            $left,
            $encoding
        );
        $rightPad = static::sub(
            static::repeat($pad, (int) ceil($right / $padLength)),
            0,
            $right,
            $encoding
        );
        return $leftPad . $string . $rightPad;
    }

    /**
     * Get ASCII characters map
     *
     * @return void
     */
    protected static function getCharacterMap()
    {
        return static::$characterMap ?? [
            '0'     => ['°', '₀', '۰', '０'],
            '1'     => ['¹', '₁', '۱', '１'],
            '2'     => ['²', '₂', '۲', '２'],
            '3'     => ['³', '₃', '۳', '３'],
            '4'     => ['⁴', '₄', '۴', '٤', '４'],
            '5'     => ['⁵', '₅', '۵', '٥', '５'],
            '6'     => ['⁶', '₆', '۶', '٦', '６'],
            '7'     => ['⁷', '₇', '۷', '７'],
            '8'     => ['⁸', '₈', '۸', '８'],
            '9'     => ['⁹', '₉', '۹', '９'],
            'a'     => ['à', 'á', 'ả', 'ã', 'ạ', 'ă', 'ắ', 'ằ', 'ẳ', 'ẵ',
                        'ặ', 'â', 'ấ', 'ầ', 'ẩ', 'ẫ', 'ậ', 'ā', 'ą', 'å',
                        'α', 'ά', 'ἀ', 'ἁ', 'ἂ', 'ἃ', 'ἄ', 'ἅ', 'ἆ', 'ἇ',
                        'ᾀ', 'ᾁ', 'ᾂ', 'ᾃ', 'ᾄ', 'ᾅ', 'ᾆ', 'ᾇ', 'ὰ', 'ά',
                        'ᾰ', 'ᾱ', 'ᾲ', 'ᾳ', 'ᾴ', 'ᾶ', 'ᾷ', 'а', 'أ', 'အ',
                        'ာ', 'ါ', 'ǻ', 'ǎ', 'ª', 'ა', 'अ', 'ا', 'ａ', 'ä'],
            'b'     => ['б', 'β', 'ب', 'ဗ', 'ბ', 'ｂ'],
            'c'     => ['ç', 'ć', 'č', 'ĉ', 'ċ', 'ｃ'],
            'd'     => ['ď', 'ð', 'đ', 'ƌ', 'ȡ', 'ɖ', 'ɗ', 'ᵭ', 'ᶁ', 'ᶑ',
                        'д', 'δ', 'د', 'ض', 'ဍ', 'ဒ', 'დ', 'ｄ'],
            'e'     => ['é', 'è', 'ẻ', 'ẽ', 'ẹ', 'ê', 'ế', 'ề', 'ể', 'ễ',
                        'ệ', 'ë', 'ē', 'ę', 'ě', 'ĕ', 'ė', 'ε', 'έ', 'ἐ',
                        'ἑ', 'ἒ', 'ἓ', 'ἔ', 'ἕ', 'ὲ', 'έ', 'е', 'ё', 'э',
                        'є', 'ə', 'ဧ', 'ေ', 'ဲ', 'ე', 'ए', 'إ', 'ئ', 'ｅ'],
            'f'     => ['ф', 'φ', 'ف', 'ƒ', 'ფ', 'ｆ'],
            'g'     => ['ĝ', 'ğ', 'ġ', 'ģ', 'г', 'ґ', 'γ', 'ဂ', 'გ', 'گ',
                        'ｇ'],
            'h'     => ['ĥ', 'ħ', 'η', 'ή', 'ح', 'ه', 'ဟ', 'ှ', 'ჰ', 'ｈ'],
            'i'     => ['í', 'ì', 'ỉ', 'ĩ', 'ị', 'î', 'ï', 'ī', 'ĭ', 'į',
                        'ı', 'ι', 'ί', 'ϊ', 'ΐ', 'ἰ', 'ἱ', 'ἲ', 'ἳ', 'ἴ',
                        'ἵ', 'ἶ', 'ἷ', 'ὶ', 'ί', 'ῐ', 'ῑ', 'ῒ', 'ΐ', 'ῖ',
                        'ῗ', 'і', 'ї', 'и', 'ဣ', 'ိ', 'ီ', 'ည်', 'ǐ', 'ი',
                        'इ', 'ی', 'ｉ'],
            'j'     => ['ĵ', 'ј', 'Ј', 'ჯ', 'ج', 'ｊ'],
            'k'     => ['ķ', 'ĸ', 'к', 'κ', 'Ķ', 'ق', 'ك', 'က', 'კ', 'ქ',
                        'ک', 'ｋ'],
            'l'     => ['ł', 'ľ', 'ĺ', 'ļ', 'ŀ', 'л', 'λ', 'ل', 'လ', 'ლ',
                        'ｌ'],
            'm'     => ['м', 'μ', 'م', 'မ', 'მ', 'ｍ'],
            'n'     => ['ñ', 'ń', 'ň', 'ņ', 'ŉ', 'ŋ', 'ν', 'н', 'ن', 'န',
                        'ნ', 'ｎ'],
            'o'     => ['ó', 'ò', 'ỏ', 'õ', 'ọ', 'ô', 'ố', 'ồ', 'ổ', 'ỗ',
                        'ộ', 'ơ', 'ớ', 'ờ', 'ở', 'ỡ', 'ợ', 'ø', 'ō', 'ő',
                        'ŏ', 'ο', 'ὀ', 'ὁ', 'ὂ', 'ὃ', 'ὄ', 'ὅ', 'ὸ', 'ό',
                        'о', 'و', 'θ', 'ို', 'ǒ', 'ǿ', 'º', 'ო', 'ओ', 'ｏ',
                        'ö'],
            'p'     => ['п', 'π', 'ပ', 'პ', 'پ', 'ｐ'],
            'q'     => ['ყ', 'ｑ'],
            'r'     => ['ŕ', 'ř', 'ŗ', 'р', 'ρ', 'ر', 'რ', 'ｒ'],
            's'     => ['ś', 'š', 'ş', 'с', 'σ', 'ș', 'ς', 'س', 'ص', 'စ',
                        'ſ', 'ს', 'ｓ'],
            't'     => ['ť', 'ţ', 'т', 'τ', 'ț', 'ت', 'ط', 'ဋ', 'တ', 'ŧ',
                        'თ', 'ტ', 'ｔ'],
            'u'     => ['ú', 'ù', 'ủ', 'ũ', 'ụ', 'ư', 'ứ', 'ừ', 'ử', 'ữ',
                        'ự', 'û', 'ū', 'ů', 'ű', 'ŭ', 'ų', 'µ', 'у', 'ဉ',
                        'ု', 'ူ', 'ǔ', 'ǖ', 'ǘ', 'ǚ', 'ǜ', 'უ', 'उ', 'ｕ',
                        'ў', 'ü'],
            'v'     => ['в', 'ვ', 'ϐ', 'ｖ'],
            'w'     => ['ŵ', 'ω', 'ώ', 'ဝ', 'ွ', 'ｗ'],
            'x'     => ['χ', 'ξ', 'ｘ'],
            'y'     => ['ý', 'ỳ', 'ỷ', 'ỹ', 'ỵ', 'ÿ', 'ŷ', 'й', 'ы', 'υ',
                        'ϋ', 'ύ', 'ΰ', 'ي', 'ယ', 'ｙ'],
            'z'     => ['ź', 'ž', 'ż', 'з', 'ζ', 'ز', 'ဇ', 'ზ', 'ｚ'],
            'aa'    => ['ع', 'आ', 'آ'],
            'ae'    => ['æ', 'ǽ'],
            'ai'    => ['ऐ'],
            'ch'    => ['ч', 'ჩ', 'ჭ', 'چ'],
            'dj'    => ['ђ', 'đ'],
            'dz'    => ['џ', 'ძ'],
            'ei'    => ['ऍ'],
            'gh'    => ['غ', 'ღ'],
            'ii'    => ['ई'],
            'ij'    => ['ĳ'],
            'kh'    => ['х', 'خ', 'ხ'],
            'lj'    => ['љ'],
            'nj'    => ['њ'],
            'oe'    => ['œ', 'ؤ'],
            'oi'    => ['ऑ'],
            'oii'   => ['ऒ'],
            'ps'    => ['ψ'],
            'sh'    => ['ш', 'შ', 'ش'],
            'shch'  => ['щ'],
            'ss'    => ['ß'],
            'sx'    => ['ŝ'],
            'th'    => ['þ', 'ϑ', 'ث', 'ذ', 'ظ'],
            'ts'    => ['ц', 'ც', 'წ'],
            'uu'    => ['ऊ'],
            'ya'    => ['я'],
            'yu'    => ['ю'],
            'zh'    => ['ж', 'ჟ', 'ژ'],
            '(c)'   => ['©'],
            'A'     => ['Á', 'À', 'Ả', 'Ã', 'Ạ', 'Ă', 'Ắ', 'Ằ', 'Ẳ', 'Ẵ',
                        'Ặ', 'Â', 'Ấ', 'Ầ', 'Ẩ', 'Ẫ', 'Ậ', 'Å', 'Ā', 'Ą',
                        'Α', 'Ά', 'Ἀ', 'Ἁ', 'Ἂ', 'Ἃ', 'Ἄ', 'Ἅ', 'Ἆ', 'Ἇ',
                        'ᾈ', 'ᾉ', 'ᾊ', 'ᾋ', 'ᾌ', 'ᾍ', 'ᾎ', 'ᾏ', 'Ᾰ', 'Ᾱ',
                        'Ὰ', 'Ά', 'ᾼ', 'А', 'Ǻ', 'Ǎ', 'Ａ', 'Ä'],
            'B'     => ['Б', 'Β', 'ब', 'Ｂ'],
            'C'     => ['Ç','Ć', 'Č', 'Ĉ', 'Ċ', 'Ｃ'],
            'D'     => ['Ď', 'Ð', 'Đ', 'Ɖ', 'Ɗ', 'Ƌ', 'ᴅ', 'ᴆ', 'Д', 'Δ',
                        'Ｄ'],
            'E'     => ['É', 'È', 'Ẻ', 'Ẽ', 'Ẹ', 'Ê', 'Ế', 'Ề', 'Ể', 'Ễ',
                        'Ệ', 'Ë', 'Ē', 'Ę', 'Ě', 'Ĕ', 'Ė', 'Ε', 'Έ', 'Ἐ',
                        'Ἑ', 'Ἒ', 'Ἓ', 'Ἔ', 'Ἕ', 'Έ', 'Ὲ', 'Е', 'Ё', 'Э',
                        'Є', 'Ə', 'Ｅ'],
            'F'     => ['Ф', 'Φ', 'Ｆ'],
            'G'     => ['Ğ', 'Ġ', 'Ģ', 'Г', 'Ґ', 'Γ', 'Ｇ'],
            'H'     => ['Η', 'Ή', 'Ħ', 'Ｈ'],
            'I'     => ['Í', 'Ì', 'Ỉ', 'Ĩ', 'Ị', 'Î', 'Ï', 'Ī', 'Ĭ', 'Į',
                        'İ', 'Ι', 'Ί', 'Ϊ', 'Ἰ', 'Ἱ', 'Ἳ', 'Ἴ', 'Ἵ', 'Ἶ',
                        'Ἷ', 'Ῐ', 'Ῑ', 'Ὶ', 'Ί', 'И', 'І', 'Ї', 'Ǐ', 'ϒ',
                        'Ｉ'],
            'J'     => ['Ｊ'],
            'K'     => ['К', 'Κ', 'Ｋ'],
            'L'     => ['Ĺ', 'Ł', 'Л', 'Λ', 'Ļ', 'Ľ', 'Ŀ', 'ल', 'Ｌ'],
            'M'     => ['М', 'Μ', 'Ｍ'],
            'N'     => ['Ń', 'Ñ', 'Ň', 'Ņ', 'Ŋ', 'Н', 'Ν', 'Ｎ'],
            'O'     => ['Ó', 'Ò', 'Ỏ', 'Õ', 'Ọ', 'Ô', 'Ố', 'Ồ', 'Ổ', 'Ỗ',
                        'Ộ', 'Ơ', 'Ớ', 'Ờ', 'Ở', 'Ỡ', 'Ợ', 'Ø', 'Ō', 'Ő',
                        'Ŏ', 'Ο', 'Ό', 'Ὀ', 'Ὁ', 'Ὂ', 'Ὃ', 'Ὄ', 'Ὅ', 'Ὸ',
                        'Ό', 'О', 'Θ', 'Ө', 'Ǒ', 'Ǿ', 'Ｏ', 'Ö'],
            'P'     => ['П', 'Π', 'Ｐ'],
            'Q'     => ['Ｑ'],
            'R'     => ['Ř', 'Ŕ', 'Р', 'Ρ', 'Ŗ', 'Ｒ'],
            'S'     => ['Ş', 'Ŝ', 'Ș', 'Š', 'Ś', 'С', 'Σ', 'Ｓ'],
            'T'     => ['Ť', 'Ţ', 'Ŧ', 'Ț', 'Т', 'Τ', 'Ｔ'],
            'U'     => ['Ú', 'Ù', 'Ủ', 'Ũ', 'Ụ', 'Ư', 'Ứ', 'Ừ', 'Ử', 'Ữ',
                        'Ự', 'Û', 'Ū', 'Ů', 'Ű', 'Ŭ', 'Ų', 'У', 'Ǔ', 'Ǖ',
                        'Ǘ', 'Ǚ', 'Ǜ', 'Ｕ', 'Ў', 'Ü'],
            'V'     => ['В', 'Ｖ'],
            'W'     => ['Ω', 'Ώ', 'Ŵ', 'Ｗ'],
            'X'     => ['Χ', 'Ξ', 'Ｘ'],
            'Y'     => ['Ý', 'Ỳ', 'Ỷ', 'Ỹ', 'Ỵ', 'Ÿ', 'Ῠ', 'Ῡ', 'Ὺ', 'Ύ',
                        'Ы', 'Й', 'Υ', 'Ϋ', 'Ŷ', 'Ｙ'],
            'Z'     => ['Ź', 'Ž', 'Ż', 'З', 'Ζ', 'Ｚ'],
            'AE'    => ['Æ', 'Ǽ'],
            'Ch'    => ['Ч'],
            'Dj'    => ['Ђ'],
            'Dz'    => ['Џ'],
            'Gx'    => ['Ĝ'],
            'Hx'    => ['Ĥ'],
            'Ij'    => ['Ĳ'],
            'Jx'    => ['Ĵ'],
            'Kh'    => ['Х'],
            'Lj'    => ['Љ'],
            'Nj'    => ['Њ'],
            'Oe'    => ['Œ'],
            'Ps'    => ['Ψ'],
            'Sh'    => ['Ш'],
            'Shch'  => ['Щ'],
            'Ss'    => ['ẞ'],
            'Th'    => ['Þ'],
            'Ts'    => ['Ц'],
            'Ya'    => ['Я'],
            'Yu'    => ['Ю'],
            'Zh'    => ['Ж'],
            ' '     => ["\xC2\xA0", "\xE2\x80\x80", "\xE2\x80\x81",
                        "\xE2\x80\x82", "\xE2\x80\x83", "\xE2\x80\x84",
                        "\xE2\x80\x85", "\xE2\x80\x86", "\xE2\x80\x87",
                        "\xE2\x80\x88", "\xE2\x80\x89", "\xE2\x80\x8A",
                        "\xE2\x80\xAF", "\xE2\x81\x9F", "\xE3\x80\x80",
                        "\xEF\xBE\xA0"],
        ];
    }

    /**
     * Get language-specific character map
     *
     * @param string $language
     * @return array
     */
    protected static function getCharacterMapForLanguage($language = 'en') : array
    {
        $splitLanguage = preg_split('/[-_]/', $language);
        $language = mb_strtolower($splitLanguage[0]);
        $map = array_merge(
            [
                'de' => [
                    ['ä',  'ö',  'ü',  'Ä',  'Ö',  'Ü' ],
                    ['ae', 'oe', 'ue', 'AE', 'OE', 'UE'],
                ],
                'bg' => [
                    ['х', 'Х', 'щ', 'Щ', 'ъ', 'Ъ', 'ь', 'Ь'],
                    ['h', 'H', 'sht', 'SHT', 'a', 'А', 'y', 'Y']
                ]
            ],
            static::$characterMapLanguage ?? []
        );
        return $map[$language] ?? [];
    }

    /**
     * Get character map for random string generation
     *
     * @param boolean $readable
     * @return array
     */
    protected static function getCharacterMapForRandom($readable = false) : array
    {
        if (static::$characterMapRandom && !$readable) {
            return static::$characterMapRandom;
        }
        if (static::$characterMapRandomReadable && $readable) {
            return static::$characterMapRandomReadable;
        }
        return $readable ? [
            'consonants' => str_split('bcdfghjklmnpqrstvwxyz'),
            'vowels' => str_split('aeiou')
        ] : str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789');
    }

    /**
     * Get encoding
     *
     * @return void
     */
    protected static function getEncoding()
    {
        return static::$encoding ?? mb_internal_encoding();
    }

    /**
     * Get false values for bool conversions
     *
     * @return void
     */
    protected static function getFalseValues()
    {
        return static::$falseValues ?? [
            'no',
            'no way',
            'nope',
            'nah',
            'na',
            'never',
            'absolutely not',
            'by no means',
            'negative',
            'never ever',
            'false',
            'f',
            'off',
            '0',
            'non',
            'faux',
            'нет',
            'н',
            'немає',
            '-',
        ];
    }

    /**
     * Get encoding for regex
     *
     * @return void
     */
    protected static function getRegexEncoding()
    {
        return static::$regexEncoding ?? mb_regex_encoding();
    }

    /**
     * Get default ignored words list for titlize
     *
     * @return array
     */
    protected static function getTitlizeIgnores() : array
    {
        return static::$titlizeIgnores ?? [
            'and',
            'as',
            'at',
            'but',
            'by',
            'en',
            'for',
            'if',
            'in',
            'of',
            'on',
            'or',
            'the',
            'to',
            'vs',
            'vs.',
            'via'
        ];
    }

    /**
     * Get true values for bool conversions
     *
     * @return void
     */
    protected static function getTrueValues()
    {
        return static::$trueValues ?? [
            'affirmative',
            'all right',
            'aye',
            'indubitably',
            'most assuredly',
            'ok',
            'of course',
            'oui',
            'okay',
            'sure thing',
            'y',
            'yes',
            'yea',
            'yep',
            'sure',
            'yeah',
            'true',
            't',
            'on',
            '1',
            'vrai',
            'да',
            'д',
            '+',
            '++',
            '+++',
            '++++',
            '+++++',
            '*',
        ];
    }
}
