<?php

namespace Adecoder\Coordinate\Distance\Handler;

use Adecoder\Coordinate\Distance\Interfaces\AreaInterface;

class Calculator implements AreaInterface
{
   private const EARTH_RADIUS_KM = 6371;

   /**
    * Area Value
    * @var int|float
    */
   private int|float $area;

   /**
    * Object Instantiate
    * @param float $latitude1 
    * @param float $longitude1 
    * @param float $latitude2 
    * @param float $longitude2 
    * @return void 
    */
   public final function __construct(
      private float $latitude1,
      private float $longitude1,
      private float $latitude2,
      private float $longitude2
   ) {
      // @todo: Skip Coding
   }

   /**
    * Calculate Distance
    * @return object 
    */
   public function set(): object
   {
      $lat = ($this->latitude2 - $this->latitude1) / 2;
      $lng = ($this->longitude2 - $this->longitude1) / 2;
      $sin = sin(deg2rad($lat)) * sin(deg2rad($lat));
      $cos = cos(deg2rad($this->latitude1)) * cos(deg2rad($this->latitude2)) * sin(deg2rad($lng)) * sin(deg2rad($lng));
      $this->area = $sin + $cos;
      return $this;
   }

   /**
    * Get Result
    * @return string|float 
    */
   public function get(): string|float
   {
      return round(2 * self::EARTH_RADIUS_KM * asin(min(1, sqrt($this->area))), 4);
   }
}
