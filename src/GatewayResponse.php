<?php

namespace Demv\Gateway;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

/**
 * Class GatewayResponse
 * @package Demv\Gateway
 */
final class GatewayResponse implements GatewayResponseInterface
{
    /**
     * @var ResponseInterface
     */
    private $response;

    /**
     * GatewayResponseAdapter constructor.
     *
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    /**
     * @return string
     */
    public function getProtocolVersion()
    {
        return $this->response->getProtocolVersion();
    }

    /**
     * @param string $version
     *
     * @return static
     */
    public function withProtocolVersion($version)
    {
        return new self($this->response->withProtocolVersion($version));
    }

    /**
     * @return string[][]
     */
    public function getHeaders()
    {
        return $this->response->getHeaders();
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    public function hasHeader($name)
    {
        return $this->response->hasHeader($name);
    }

    /**
     * @param string $name
     *
     * @return string[]
     */
    public function getHeader($name)
    {
        return $this->response->getHeader($name);
    }

    /**
     * @param string $name
     *
     * @return string
     */
    public function getHeaderLine($name)
    {
        return $this->response->getHeaderLine($name);
    }

    /**
     * @param string          $name
     * @param string|string[] $value
     *
     * @return static
     */
    public function withHeader($name, $value)
    {
        return new self($this->response->withHeader($name, $value));
    }

    /**
     * @param string          $name
     * @param string|string[] $value
     *
     * @return static
     */
    public function withAddedHeader($name, $value)
    {
        return new self($this->response->withAddedHeader($name, $value));
    }

    /**
     * @param string $name
     *
     * @return static
     */
    public function withoutHeader($name)
    {
        return new self($this->response->withoutHeader($name));
    }

    /**
     * @return StreamInterface
     */
    public function getBody()
    {
        return $this->response->getBody();
    }

    /**
     * @param StreamInterface $body
     *
     * @return static
     */
    public function withBody(StreamInterface $body)
    {
        return new self($this->response->withBody($body));
    }

    /**
     * @return bool
     */
    public function isSuccessful(): bool
    {
        $code = $this->getStatusCode();

        return $code >= 200 && $code < 300;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->response->getStatusCode();
    }

    /**
     * @param int    $code
     * @param string $reasonPhrase
     *
     * @return static
     */
    public function withStatus($code, $reasonPhrase = '')
    {
        return new self($this->response->withStatus($code, $reasonPhrase));
    }

    /**
     * @return string
     */
    public function getReasonPhrase()
    {
        return $this->response->getReasonPhrase();
    }
}
