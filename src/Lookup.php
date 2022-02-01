<?php

namespace Adecoder\Coordinate;

use Adecoder\Coordinate\Clients\Services\IpApi;
use Adecoder\Coordinate\Clients\Services\PositionStack;

class Lookup
{
   /**
    * Object Instantiate
    * @return void 
    */
   public final function __construct()
   {
      // @todo: Skip Coding
   }

   /**
    * IpApi Handler
    * @param string $ip 
    * @return string|array 
    */
   public function ipaddr(string $ip): string|array
   {
      $ipaddr = new IpApi(ip: $ip);
      return $ipaddr->render();
   }

   /**
    * PositionStack Handler
    * @param string|float $lat 
    * @param string|float $lng 
    * @return string|array 
    */
   public function coords(string|float $lat, string|float $lng): string|array
   {
      $coords = new PositionStack(latitude: $lat, longitude: $lng);
      return $coords->render();
   }
}
