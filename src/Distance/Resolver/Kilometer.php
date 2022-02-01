<?php

namespace Adecoder\Coordinate\Distance\Resolver;

use Adecoder\Coordinate\Distance\Interfaces\CoordinateInterface;

class Kilometer implements CoordinateInterface
{
   private const CALCULATE = 1.60934;

   /**
    * Object Intantiate
    * @param int|float $value 
    * @return void 
    */
   public final function __construct(private int|float $value)
   {
      // @todo: Skip Coding
   }

   /**
    * Get Kilometer
    * @return float 
    */
   public function get(): int|float
   {
      return $this->value * self::CALCULATE;
   }
}
