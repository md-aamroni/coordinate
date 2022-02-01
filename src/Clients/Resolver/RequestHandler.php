<?php

namespace Adecoder\Coordinate\Clients\Resolver;

use Exception;
use Adecoder\Coordinate\Clients\Interfaces\ResolverInterface;

class RequestHandler implements ResolverInterface
{
   /**
    * cURL Object
    * @var object
    */
   private object $handlers;

   /**
    * Response String
    * @var string
    */
   private string $response;

   /**
    * Http Status Code
    * @var string
    */
   private string $httpcode;

   /**
    * Object instantiate
    * @return void 
    */
   public final function __construct()
   {
      // @todo: Skip Coding
   }

   /**
    * Request Handler
    * @param string $request 
    * @return object 
    */
   public function set(string $request): object
   {
      $this->handlers = curl_init();
      curl_setopt(handle: $this->handlers, option: CURLOPT_URL, value: $request);
      curl_setopt(handle: $this->handlers, option: CURLOPT_POST, value: false);
      curl_setopt(handle: $this->handlers, option: CURLOPT_RETURNTRANSFER, value: true);
      curl_setopt(handle: $this->handlers, option: CURLOPT_SSL_VERIFYPEER, value: false);
      $this->response = curl_exec(handle: $this->handlers);
      $this->httpcode = curl_getinfo(handle: $this->handlers, option: CURLINFO_HTTP_CODE);
      curl_close(handle: $this->handlers);
      return $this;
   }

   /**
    * Get Result
    * @return string|array 
    */
   public function get(): string|array
   {
      try {
         if ($this->response === FALSE) {
            throw new Exception(curl_error(handle: $this->handlers));
         }
         return array('response' => $this->response, 'httpCode' => $this->httpcode);
      } catch (\Throwable $th) {
         return $th->getMessage();
      }
   }
}
