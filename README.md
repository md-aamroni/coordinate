<p align="center">
   <a href="https://adecoder.com" target="_blank">
      <img src="https://user-images.githubusercontent.com/61397934/151708131-1373e724-9264-4a52-b2f4-022f3d948357.png">
   </a>
   <h2>Distance Calculate and 3rd Party API Services in PHP</h2>
</p>

![workflow](https://github.com/md-aamroni/coordinate/actions/workflows/application.yml/badge.svg)
![Copyright](https://img.shields.io/badge/Copyright-aDecoder-brightgreen.svg)
[![License](https://img.shields.io/badge/License-MIT-brightgreen.svg)](./LICENSE)
![Developed](https://img.shields.io/badge/PHP->=8.0-brightgreen.svg)
![Copyright](https://img.shields.io/badge/Developer-md.aamroni-brightgreen.svg)


### Installation
```bash
composer require adecoder/coordinate
```

### [Environment Varaible](.env-example)
```env
IP_API_KEY=your-api-key
IP_API_URL=http://api.ipapi.com/

POSITION_STACK_KEY=your-api-key
POSITION_STACK_URL=http://api.positionstack.com/v1/reverse
```

### Distance Calculate
```php 
use Adecoder\Coordinate\Distance;

$area = new Distance();
echo $area->set(lat1: 23.6293159, lng1: 90.4870177, lat2: 24.3761958, lng2: 88.5793325)->get(unit: 'k');
```

### IP Details
```php 
use Adecoder\Coordinate\Lookup;
use Adecoder\Coordinate\Clients\Services\IpApi;

$loopup = new Lookup();
echo '<pre>';
print_r($loopup->ipaddr(ip: '103.151.11.64'))
echo '</pre>';
```

### GeoLocation Details
```php 
use Adecoder\Coordinate\Lookup;

$coords = new Lookup();
echo '<pre>';
print_r($loopup->coords(lat: '23.6307225', lng: '90.4901339'))
echo '</pre>';
```