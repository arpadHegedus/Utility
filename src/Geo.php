<?php
/**
 * Geocoding utilities
 *
 * @package utility
 */

namespace Utility;

use Utility\URL;

class Geo
{
    /**
     * Get lat lng data from an address
     *
     * @param string $address
     * @param array $apiParameters
     * @return null|string
     */
    public static function address(string $address, array $apiParameters = []) : ? string
    {
        $data = static::getAddress($address, $apiParameters);
        if (!$data) {
            return null;
        }
        return $data[0]['geometry']['location'];
    }

    /**
     * Calculate the distance between 2 pairs of lat and lng values
     *
     * @param string $address1
     * @param string $address2
     * @param array $apiParameters
     * @param string $unit
     * @return float
     */
    public static function addressDistance(string $address1, string $address2, array $apiParameters = [], string $unit = 'M')
    {
        $address1 = static::address($address1, $apiParameters);
        $address2 = static::address($address2, $apiParameters);
        if (!$address1 || !$address2) {
            return null;
        }
        $data = static::getDistance($address1['lat'], $address1['lng'], $address2['lat'], $address2['lng']);
        if (!$data) {
            return null;
        }
        return $data[$unit];
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
    public static function distance(float $lat1, float $lng1, float $lat2, float $lng2, string $unit = 'M') : ? string
    {
        $data = static::getDistance($lat1, $lng1, $lat2, $lng2);
        if (!$data) {
            return null;
        }
        return $data[$unit];
    }

    /**
     * Get geo data from an address
     *
     * @param string $address
     * @param array $apiParameters
     */
    public static function getAddress(string $address, array $apiParameters = []) : ? array
    {
        $apiParameters['address'] = $address;
        $apiParameters = array_map('urlencode', $apiParameters);
        $url = URL::querySet('https://maps.google.com/maps/api/geocode/json', $apiParameters);
        $resource = curl_init();
        curl_setopt($resource, CURLOPT_URL, $url);
        curl_setopt($resource, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec($resource);
        $response = curl_getinfo($resource, CURLOPT_RETURNTRANSFER, true);
        if ($response !== 200) {
            return null;
        }
        $data = json_decode($data, true);
        if (!$data || !isset($data['results'][0])) {
            return null;
        }
        return $response['results'];
    }

    /**
     * Calculate the distance between 2 pairs of lat and lng values
     *
     * @param float $lat1
     * @param float $lng1
     * @param float $lat2
     * @param float $lng2
     * @return array
     */
    public static function getDistance(float $lat1, float $lng1, float $lat2, float $lng2) : array {
        $theta = $lng1 - $lng2;
        $dist = rad2deg(acos(sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta))));
        $miles = $dist * 60 * 1.1515;
        return [
            'K' => $miles * 1.609344,
            'M' => $miles,
            'N' => $miles * 0.8684,
        ];
    }
}
