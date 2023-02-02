<?php

namespace App\Enums;

enum CreditCard: int
{
    case Visa = 2;
    case MasterCard = 5;
    case AmericanExpress = 6;
    case JCB = 3;

    public function label(): string
    {
        return match($this) {
            static::Visa => 'Visa',
            static::MasterCard => 'Master Card',
            static::AmericanExpress => 'American Express',
            static::JCB => 'JCB'
        };
    }
}