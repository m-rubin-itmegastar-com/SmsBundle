<?php

namespace ITMegastar\Bundle\SmsBundle\Sms;

interface SmsInterface
{
    public function getMessage(): string;

    public function getPhoneNumber(): string;

    public function getDateTime(): \DateTime;
}