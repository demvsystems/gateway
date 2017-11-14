<?php

namespace Demv\Gateway;

use Psr\Http\Message\ResponseInterface;

/**
 * Interface GatewayResponseInterface
 * @package Demv\Gateway
 */
interface GatewayResponseInterface extends ResponseInterface
{
    /**
     * @return bool
     */
    public function isSuccessful(): bool;
}