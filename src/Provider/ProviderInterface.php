<?php

namespace ITMegastar\Bundle\SmsBundle\Provider;

use ITMegastar\Bundle\SmsBundle\Sms\SmsInterface;

interface ProviderInterface
{
    public function send(SmsInterface $sms);
}