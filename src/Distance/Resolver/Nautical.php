<?php

namespace Adecoder\Coordinate\Distance\Resolver;

use Adecoder\Coordinate\Distance\Interfaces\CoordinateInterface;

class Nautical implements CoordinateInterface
{
   private const CALCULATE = 0.868976;

   /**
    * Object Instantiate
    * @param int|float $value 
    * @return void 
    */
   public final function __construct(private int|float $value)
   {
      // @todo: Skip Coding
   }

   /**
    * Get Nautical Miles
    * @return int|float 
    */
   public function get(): int|float
   {
      return $this->value * self::CALCULATE;
   }
}
