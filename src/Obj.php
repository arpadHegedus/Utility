<?php
/**
 * Object utilities
 *
 * @package utility
 */

namespace Utility;

class Obj extends Collection
{
    /**
     * Check if an $object has a $key (property or method)
     *
     * @param object $array
     * @param string $key
     * @return bool
     */
    public static function has($object, string $key) : bool
    {
        if (property_exists(get_class($object), $key)) {
            return true;
        }
        if (method_exists($object, $key)) {
            return true;
        }
        return false;
    }

    /**
     * Get all properties from an $object
     *
     * @param object $object
     * @return array
     */
    public static function properties($object)
    {
        return array_keys(get_class_vars($object));
    }

    /**
     * Get all methods from an $object
     *
     * @param object $object
     * @return null|array
     */
    public static function methods($object)
    {
        return get_class_methods(get_class($object));
    }

    /**
     * Unpack an $attribute from an $object
     *
     * @param object $data
     * @param null|string $attribute
     * @return object
     */
    public static function unpack($data, $attribute = null)
    {
        $data = (array) $data;
        $data = $attribute ? static::get($data, $attribute) : array_splice($data, 0, 1, true);
        return $data;
    }
}
