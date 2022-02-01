<?php

namespace Adecoder\Coordinate\Clients\Services;

use Adecoder\Coordinate\Clients\Interfaces\LocationInterface;
use Adecoder\Coordinate\Clients\Resolver\RequestHandler;

class IpApi implements LocationInterface
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
    * @param string $ip 
    * @return void 
    */
   public final function __construct(private string $ip)
   {
      $this->apikey = isset($_ENV['IP_API_KEY']) ? $_ENV['IP_API_KEY'] : '';
      $this->apiurl = isset($_ENV['IP_API_URL']) ? rtrim($_ENV['IP_API_URL'], '/') : '';
      $this->router = sprintf('%s/%s?access_key=%s', $this->apiurl, filter_var(trim(addslashes($this->ip)), FILTER_VALIDATE_IP), $this->apikey);
   }

   /**
    * Render IP
    * @return string|array 
    */
   public function render(): string|array
   {
      $request = new RequestHandler();
      return $request->set(request: $this->router)->get();
   }
}
