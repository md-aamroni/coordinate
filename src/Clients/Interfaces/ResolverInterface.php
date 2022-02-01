<?php

namespace Adecoder\Coordinate\Clients\Interfaces;

interface ResolverInterface
{
   public function set(string $request): object;
   public function get(): string|array;
}
