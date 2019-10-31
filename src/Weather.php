<?php


namespace Bordon\Weather;

use Exception;
use GuzzleHttp\Client;
use Bordon\Weather\Exceptions\InvalidArgumentException;
use Bordon\Weather\Exceptions\HttpException;

class Weather
{
    protected $key;
    protected $guzzleOption = [];

    public function __construct(string $key)
    {
        $this->key = $key;
    }

    public function setGuzzleOptions(array $options)
    {
        return $this->guzzleOption = $options;
    }

    public function getWeather($city, string $type = 'base', string $format = 'json')
    {
        $url = 'https://restapi.amap.com/v3/weather/weatherInfo';
        if (!in_array(strtolower($format), ['xml', 'json'])) {
            throw new InvalidArgumentException('Invalid response format: ' . $format);
        }

        if (!in_array(strtolower($type), ['base', 'all'])) {
            throw new InvalidArgumentException('Invalid type value(base/all): ' . $type);
        }

        $query = array_filter([
            'key' => $this->key,
            'city' => $city,
            'output' => $format,
            'extensions' => $type,
        ]);

        try {
            $response = $this->getHttpClient()->get($url, [
                'query' => $query,
            ])->getBody()->getContents();

            return 'json' === $format ? json_decode($response, true) : $response;
        } catch (Exception $e) {
            throw new HttpException($e->getMessage(), $e->getCode(), $e);
        }
    }

    public function getHttpClient()
    {
        return new Client($this->guzzleOption);
    }

}