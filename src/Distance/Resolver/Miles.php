<?php

namespace Adecoder\Coordinate\Distance\Resolver;

use Adecoder\Coordinate\Distance\Interfaces\CoordinateInterface;

class Miles implements CoordinateInterface
{
   private const CALCULATE = 1;

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
    * Get Miles
    * @return int|float 
    */
   public function get(): int|float
   {
      return $this->value * self::CALCULATE;
   }
}
