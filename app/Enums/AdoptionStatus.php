<?php

namespace App\Enums;

enum AdoptionStatus: string
{
    case Adopted = 'adopted';
    case Vet = 'vet';
    case InAdoptionProcess = 'in apdotion process';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
