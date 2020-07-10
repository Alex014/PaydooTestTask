<?php
namespace paydoo_test_lib\Http;

class HttpBasicRequestStack implements HttpBasicRequestStackInterface {
    private $client;
    private $rfactory;
    
    public function __construct(Psr\Http\Client\ClientInterface $client, Psr\Http\Message\RequestFactoryInterface $requestFactory)
    {
        $requestFactory->createRequest('POST', 'http://example.com');
    }
    

    public function getClient(): Psr\Http\Client\ClientInterface
    {
        return $this->client;
    }
    
    public function getRequestFactory(): Psr\Http\Message\RequestFactoryInterface
    {
        return $this->rfactory;
    }
}
