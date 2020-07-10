<?php
namespace paydoo_test_lib\Http;


interface HttpBasicRequestStackInterface {
    public function __construct(Psr\Http\Client\ClientInterface $client, Psr\Http\Message\RequestFactoryInterface $requestFactory);
    
    public function getClient(): Psr\Http\Client\ClientInterface;
    public function getRequestFactory(): Psr\Http\Message\RequestFactoryInterface;
}
