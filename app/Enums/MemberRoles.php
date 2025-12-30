<?php

namespace App\Enums;

enum MemberRoles: string
{
    case Founders = 'founder';
    case Volunteers = 'volunteer';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
