<?php

namespace ITMegastar\Bundle\SmsBundle\Tests\Fixture\Provider;

use ITMegastar\Bundle\SmsBundle\Provider\ProviderInterface;
use ITMegastar\Bundle\SmsBundle\Sms\SmsInterface;

class ProviderFixture
{
    public static function getProvider(): ProviderInterface
    {
        return new class implements ProviderInterface {
            public function send(SmsInterface $sms)
            {
                return true;
            }
        };
    }
}