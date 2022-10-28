<?php

namespace App\Enum;

enum ItemEnum: int
{
    case Private = 0;
    case Publish = 1;

    public function label(): string
    {
        return match($this)
        {
            self::Publish => '公開',
            self::Private => '非公開',
        };
    }
}