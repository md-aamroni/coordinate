<?php

namespace Adecoder\Coordinate;

use Adecoder\Coordinate\Distance\Handler\Calculator;
use Adecoder\Coordinate\Distance\Resolver\Kilometer;
use Adecoder\Coordinate\Distance\Resolver\Miles;
use Adecoder\Coordinate\Distance\Resolver\Nautical;

class Distance
{
   /**
    * Area Value
    * @var int|float
    */
   private int|float $area;

   /**
    * Object Instantiate
    * @return void 
    */
   public final function __construct()
   {
      // @todo: Skip Coding
   }

   /**
    * Set Coordinates
    * @param float $lat1 
    * @param float $lng1 
    * @param float $lat2 
    * @param float $lng2 
    * @return object 
    */
   public function set(float $lat1, float $lng1, float $lat2, float $lng2): object
   {
      $calculator = new Calculator(latitude1: $lat1, longitude1: $lng1, latitude2: $lat2, longitude2: $lng2);
      $this->area = $calculator->set()->get();
      return $this;
   }

   /**
    * Get Distance
    * @param null|string $unit 
    * @return string|float 
    */
   public function get(?string $unit = 'm'): string|float
   {
      $distance = match (strtoupper($unit)) {
         'M' => new Miles(value: $this->area),
         'K' => new Kilometer(value: $this->area),
         'N' => new Nautical(value: $this->area)
      };
      return sprintf('%.2f', $distance->get());
   }
}
