<?php
/**
 * URL utilities
 *
 * @package utility
 */

namespace Utility;

use Utility\Arr;
use Utility\Str;

class URL
{
    /**
     * Add $user and $pass to a $url
     *
     * @param string|array $url
     * @param string $user
     * @param null|string $pass
     * @return string
     */
    public static function auth($url, string $user, $pass = null) : string
    {
        $url = is_string($url) ? static::parse($url) : $url;
        $url['user'] = $user;
        if ($pass) {
            $url['pass'] = $pass;
        }
        return static::build($url);
    }

    /**
     * Build a URL from a parsed array
     *
     * @param array $url
     * @return string
     */
    public static function build(array $url) : string
    {
        $built = '';
        $built .= $url['scheme'] ?? '';
        $built .= !empty($built) && (isset($url['host']) || isset($url['user'])) ? '://' : '';
        $built .= $url['user'] ?? '';
        $built .= isset($url['user']) && isset($url['pass']) ? ':' . $url['pass'] : '';
        $built .= isset($url['user']) && isset($url['host']) ? '@' : '';
        $built .= $url['host'] ?? '';
        $built .= !empty($built) && isset($url['port']) ? ':' : '';
        $built .= $url['port'] ?? '';
        $built .= $url['path'] ?? '';
        $built .= !empty($built) && isset($url['query']) ? '?' : '';
        $built .= $url['query'] ?? '';
        $built .= !empty($built) && isset($url['fragment']) ? '#' : '';
        $built .= $url['fragment'] ?? '';
        return $built;
    }

    /**
     * Get the current URL or its $parts
     *
     * @param array $parts
     * @return string
     */
    public static function current(array $parts = []) : string
    {
        $url = [];
        $url['scheme'] = 'http';
        if (!empty($_SERVER['HTTPS']) &&  $_SERVER['HTTPS'] !== 'off' ||
            isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] === 443
        ) {
            $url['scheme'] = 'https';
        }
        $url['host'] = $_SERVER['HTTP_HOST'];
        if (!empty($_SERVER['REQUEST_URI'])) {
            $uri = explode('?', $_SERVER['REQUEST_URI']);
            $url['path'] = $uri[0];
            if (isset($uri[1])) {
                $url['query'] = $uri[1];
            }
        }
        if (!empty($_SERVER['SERVER_PORT']) &&
            (
                $scheme === 'http' && $_SERVER['SERVER_PORT'] !== 80 ||
                $scheme === 'https' && $_SERVER['SERVER_PORT'] !== 443
            )
        ) {
            $url['port'] = $_SERVER['port'];
        }
        if (!empty($_SERVER['PHP_AUTH_USER'])) {
            $url['user'] = $_SERVER['PHP_AUTH_USER'];
            if (!empty($_SERVER['PHP_AUTH_PW'])) {
                $url['pass'] = $_SERVER['PHP_AUTH_PW'];
            }
        }
        return static::parts($url, $get);
    }

    /**
     * Get or $set the fragment of a $url
     *
     * @param string|array $url
     * @param boolean $set
     * @return string
     */
    public static function fragment($url, $set = false) : string
    {
        return $set === false ? static::parts($url, ['path']) : static::fragmentSet($url, $set);
    }

    /**
     * Set $fragment part of a $url
     *
     * @param string|array $url
     * @param string $fragment
     * @return string
     */
    public static function fragmentSet($url, string $fragment) : string
    {
        $url = is_string($url) ? static::parse($url) : $url;
        $url['fragment'] = $fragment;
        if (empty($url['fragment'])) {
            unset($url['fragment']);
        }
        return static::build($url);
    }

    /**
     * Get or $set the host of a $url
     *
     * @param string|array $url
     * @param boolean $set
     * @return string
     */
    public static function host($url, $set = false) : string
    {
        return $set === false ? static::parts($url, ['path']) : static::hostSet($url, $set);
    }

    /**
     * Set $host part of a $url
     *
     * @param string|array $url
     * @param string $host
     * @return string
     */
    public static function hostSet($url, string $host) : string
    {
        $url = is_string($url) ? static::parse($url) : $url;
        $url['host'] = $host;
        if (empty($url['host'])) {
            unset($url['host']);
        }
        return static::build($url);
    }

    /**
     * Consistently parse $url
     *
     * @param string $url
     * @return array
     */
    public static function parse(string $url)
    {
        $unset = [];
        if (Str::startsWith($url, '//')) {
            $unset[] = 'scheme';
            $url = 'placeholder:' . $url;
        } elseif (Str::startsWith($url, '/')) {
            $unset[] = 'scheme';
            $unset[] = 'host';
        }
        $parsed = @parse_url($url);
        if ($parsed === false) {
            return false;
        }
        Arr::remove($parsed, $unset);
        return $parsed;
    }

    /**
     * Get $parts of a $url
     *
     * @param string|array $url
     * @param array|string $part
     * @return string
     */
    public static function parts($url, $parts = ['scheme', 'host', 'path']) : string
    {
        $url = is_string($url) ? static::parse($url) : $url;
        $parts = is_string($parts) ? [$parts] : $parts;
        if (!empty($parts)) {
            $url = Arr::filter($url, function ($key) use ($parts) {
                return in_array($key, $parts);
            }, 'key');
        }
        return static::build($url);
    }

    /**
     * Get the pass part of a $url
     *
     * @param string|array $url
     * @return string
     */
    public static function pass($url) : string
    {
        return static::parts($url, ['pass']);
    }

    /**
     * Get or $set the path of a $url
     *
     * @param string|array $url
     * @param boolean $set
     * @return string
     */
    public static function path($url, $set = false) : string
    {
        return $set === false ? static::parts($url, ['path']) : static::pathSet($url, $set);
    }

    /**
     * Remove $search string or pattern from $url path
     *
     * @param [type] $url
     * @param string $remove
     * @return string
     */
    public static function pathRemove($url, string $search) : string
    {
        $url = is_string($url) ? static::parse($url) : $url;
        if (!isset($url['path'])) {
            return static::build($url);
        }
        $url['path'] = Str::remove($url['path'], $search);
        return static::build($url);
    }

    /**
     * Set $path part of a $url
     *
     * @param string|array $url
     * @param string $path
     * @return string
     */
    public static function pathSet($url, string $path) : string
    {
        $url = is_string($url) ? static::parse($url) : $url;
        $url['path'] = $path;
        if (empty($url['path'])) {
            unset($url['path']);
        }
        return static::build($url);
    }

    /**
     * Get or $set the port of a $url
     *
     * @param string|array $url
     * @param boolean $set
     * @return string
     */
    public static function port($url, $set = false) : string
    {
        return $set === false ? static::parts($url, ['path']) : static::portSet($url, $set);
    }

    /**
     * Set $port part of a $url
     *
     * @param string|array $url
     * @param string $port
     * @return string
     */
    public static function portSet($url, string $port) : string
    {
        $url = is_string($url) ? static::parse($url) : $url;
        $url['port'] = $port;
        if (empty($url['port'])) {
            unset($url['port']);
        }
        return static::build($url);
    }

    /**
     * Get or $set the query of a $url
     *
     * @param string|array $url
     * @param boolean $set
     * @return string
     */
    public static function query($url, $set = false) : string
    {
        return $set === false ? static::parts($url, ['query']) : static::querySet($url, $set);
    }

    /**
     * Add a parameter $key and $value to the query of the $url
     *
     * @param string|array $url
     * @param string $key
     * @param mixed $value
     * @return string
     */
    public static function queryAdd($url, string $key, $value) : string
    {
        $url = is_string($url) ? static::parse($url) : $url;
        if (!isset($url['query'])) {
            return static::querySet($url, [$key => $value]);
        }
        parse_str($url['query'], $q);
        $q[$key] = $value;
        $url['query'] = http_build_query($q);
        return static::build($url);
    }

    /**
     * Remove a parameter by $key from the query of the $url
     *
     * @param string|array $url
     * @param string|array $key
     * @param mixed $value
     * @return string
     */
    public static function queryRemove($url, $key) : string
    {
        $url = is_string($url) ? static::parse($url) : $url;
        if (!isset($url['query'])) {
            return static::querySet($url, [$key => $value]);
        }
        parse_str($url['query'], $q);
        $q = Arr::remove($q, $key);
        $url['query'] = http_build_query($q);
        if (empty($url['query'])) {
            unset($url['query']);
        }
        return static::build($url);
    }

    /**
     * Set the $url path part to $data
     *
     * @param string|array $url
     * @param string|array $data
     * @return string
     */
    public static function querySet($url, $data) : string
    {
        $url = is_string($url) ? static::parse($url) : $url;
        $url['query'] = is_string($data) ? $data : http_build_query($data);
        if (empty($url['query'])) {
            unset($url['query']);
        }
        return static::build($url);
    }

    /**
     * Get or $set the scheme of a $url
     *
     * @param string|array $url
     * @param boolean $set
     * @return string
     */
    public static function scheme($url, $set = false) : string
    {
        return $set === false ? static::parts($url, ['path']) : static::schemeSet($url, $set);
    }

    /**
     * Set $scheme part of a $url
     *
     * @param string|array $url
     * @param string $scheme
     * @return string
     */
    public static function schemeSet($url, string $scheme) : string
    {
        $url = is_string($url) ? static::parse($url) : $url;
        $url['scheme'] = $scheme;
        if (empty($url['scheme'])) {
            unset($url['scheme']);
        }
        return static::build($url);
    }

    /**
     * Get the user part of a $url
     *
     * @param string|array $url
     * @param false|string $set
     * @return string
     */
    public static function user($url, $set = false) : string
    {
        return $set === false ? static::parts($url, ['user']) : static::auth($url, $user);
    }
}
