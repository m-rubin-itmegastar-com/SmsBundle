<?php

declare(strict_types=1);

namespace ITMegastar\Bundle\SmsBundle\Tests\Service;

use PHPUnit\Framework\TestCase;
use ITMegastar\Bundle\SmsBundle\Service\ProviderManager;
use ITMegastar\Bundle\SmsBundle\Tests\Fixture\Provider\ProviderFixture;

class ProviderManagerTest extends TestCase
{
    public function testGetNonExistProvider(): void
    {
        $this->expectException(\OutOfBoundsException::class);

        (new ProviderManager())->getProvider('NonExistProvider');
    }

    public function testSetWrongProviderType(): void
    {
        $this->expectException(\TypeError::class);

        (new ProviderManager())->addProvider('Foo', 'Bar');
    }

    public function testGetExistsProvider(): void
    {
        $provider = ProviderFixture::getProvider();
        $name = 'TestProvider';
        $pm = new ProviderManager();

        $pm->addProvider($name, $provider);

        $this->assertEquals($provider, $pm->getProvider($name));
    }
}