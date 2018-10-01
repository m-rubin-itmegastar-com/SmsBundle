<?php

namespace ITMegastar\Bundle\SmsBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use ITMegastar\Bundle\SmsBundle\DependencyInjection\Compiler\ProviderCompilerPass;
use ITMegastar\Bundle\SmsBundle\DependencyInjection\Factory\Provider\MessageBirdProviderFactory;
use ITMegastar\Bundle\SmsBundle\DependencyInjection\Factory\Provider\SmsAeroProviderFactory;
use ITMegastar\Bundle\SmsBundle\DependencyInjection\Factory\Provider\SmsCenterProviderFactory;
use ITMegastar\Bundle\SmsBundle\DependencyInjection\Factory\Provider\SmsDiscountProviderFactory;
use ITMegastar\Bundle\SmsBundle\DependencyInjection\Factory\Provider\SmsRuProviderFactory;
use ITMegastar\Bundle\SmsBundle\DependencyInjection\SmsExtension;

class SmsBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new ProviderCompilerPass());
    }

    public function getContainerExtension()
    {
        $extension = new SmsExtension();
        $extension->addProviderFactory(new MessageBirdProviderFactory());
        $extension->addProviderFactory(new SmsRuProviderFactory());
        $extension->addProviderFactory(new SmsAeroProviderFactory());
        $extension->addProviderFactory(new SmsDiscountProviderFactory());
        $extension->addProviderFactory(new SmsCenterProviderFactory());

        return $extension;
    }
}
