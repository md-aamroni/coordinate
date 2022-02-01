<?php

namespace Adecoder\Coordinate\Clients\Services;

use Adecoder\Coordinate\Clients\Resolver\RequestHandler;
use Adecoder\Coordinate\Clients\Interfaces\LocationInterface;

class PositionStack implements LocationInterface
{
   /**
    * API Key
    * @var string
    */
   private string $apikey;

   /**
    * API Url
    * @var string
    */
   private string $apiurl;

   /**
    * API Router
    * @var string
    */
   private string $router;

   /**
    * Object Instantiate
    * @param string $latitude 
    * @param string $longitude 
    * @return void 
    */
   public final function __construct(private string $latitude, private string $longitude)
   {
      $this->apikey = isset($_ENV['POSITION_STACK_KEY']) ? $_ENV['POSITION_STACK_KEY'] : '';
      $this->apiurl = isset($_ENV['POSITION_STACK_URL']) ? rtrim($_ENV['POSITION_STACK_URL'], '/') : '';
      $this->router = sprintf('%s?access_key=%s&query=%s,%s', $this->apiurl, $this->apikey, trim($this->latitude), trim($this->longitude));
   }

   /**
    * Render Coordinate
    * @return string|array 
    */
   public function render(): string|array
   {
      $request = new RequestHandler();
      return $request->set(request: $this->router)->get();
   }
}
