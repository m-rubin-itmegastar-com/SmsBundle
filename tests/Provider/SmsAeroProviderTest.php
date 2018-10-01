<?php

declare(strict_types=1);

namespace ITMegastar\Bundle\SmsBundle\Tests\Provider;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use ITMegastar\Bundle\SmsBundle\Exception\SmsAeroException;
use ITMegastar\Bundle\SmsBundle\Provider\SmsAeroProvider;
use ITMegastar\Bundle\SmsBundle\Sms\Sms;

class SmsAeroProviderTest extends TestCase
{
    use GuzzleClientTrait;

    public function testThatSettersImplementsChainPattern(): void
    {
        $provider = (new SmsAeroProvider())
            ->setApiKey('key')
            ->setUser('user')
            ->setChannel('channel')
            ->setSign('sign')
            ->setClient(new Client())
        ;

        $this->assertInstanceOf(SmsAeroProvider::class, $provider);
    }

    public function testThatExceptionThrownOnInvalidResponseCode(): void
    {
        $this->expectException(SmsAeroException::class);

        (new SmsAeroProvider())
            ->setClient($this->getClientWithPreparedResponse(new Response(200, [], '{"success": false}')))
            ->send(new Sms('+1234567890', 'Hello World'))
        ;
    }

    public function testSend(): void
    {
        $response = (new SmsAeroProvider())
            ->setClient($this->getClientWithPreparedResponse(new Response(200, [], '{"success": true}')))
            ->send(new Sms('+1234567890', 'Hello World'))
        ;

        $this->assertTrue($response);
    }
}