<?php

namespace Yamilovs\Bundle\SmsBundle\DependencyInjection\Factory\Provider;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\DependencyInjection\ChildDefinition;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class SmsruProviderFactory implements ProviderFactoryInterface
{
    public function create(ContainerBuilder $containerBuilder, string $providerName, array $config): string
    {
        $providerDefinition = new ChildDefinition('yamilovs_sms.prototype.provider.sms_ru');
        $providerDefinition
            ->replaceArgument(0, $config['api_id'])
            ->replaceArgument(1, $config['from'])
        ;
    }

    public function getName(): string
    {
        return 'sms_ru';
    }

    public function addConfiguration(ArrayNodeDefinition $nodeDefinition): void
    {
        $nodeDefinition
            ->children()
                ->scalarNode('api_id')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('from')->defaultNull()->end()
            ->end()
        ;
    }
}