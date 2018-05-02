<?php

namespace Demv\Gateway;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

/**
 * Interface GatewayInterface
 * @package Demv\Gateway
 */
interface GatewayInterface
{
    /**
     * @param RequestInterface $request
     *
     * @return GatewayResponseInterface
     */
    public function send(RequestInterface $request): GatewayResponseInterface;

    /**
     * @param string       $method
     * @param UriInterface $uri
     *
     * @return GatewayResponseInterface
     */
    public function receive(string $method, UriInterface $uri): GatewayResponseInterface;
}
