<h1 align="center"> weather </h1>

<p align="center">:rainbow: a weather sdk.</p>

[![Build Status](https://travis-ci.org/subordon/weather.svg?branch=master)](https://travis-ci.org/subordon/weather)

## 安装

```shell
$ composer require bordon/weather -vvv
```

## 使用

```php
use Bordon\Weather\Weather;

$key = 'xxxxxxxxxxxxxxxxxxxxxxxxxxx';

$weather = new Weather($key);
```

## 获取实时天气

```php
$response = $weather->getLiveWeather('深圳');
```

## 获取预报天气

```php
$response = $weather->getForecastWeather('深圳');
```
## 设置返回格式

返回值类型，可选 json 与 xml，默认 json；
```php
$response = $weather->getLiveWeather('深圳', 'xml');
```

## 参考

- [高德开放平台天气接口](https://lbs.amap.com/api/webservice/guide/api/weatherinfo/)

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/bordon/weather/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/bordon/weather/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT