<?php

namespace App\Enum;

class Divergence
{
    public const SAFTI = 'SAFTI';
    public const MEGAGENCE = 'megAgence';
    public const SAFTI_ES = 'SAFTI-ES';

    public const BIEN_SOURCE = [
        self::SAFTI => [
            'web' => 'http://omega.dev.safti.local/Git/Frederic/kata01-api/biens.csv'
        ],
        self::MEGAGENCE => [
            'web' => 'http://megasoft.dev.safti.local/Git/Frederic/kata01-api/megagence.csv'
        ],
        self::SAFTI_ES => [
            'csv' => 'data/biens-ES.csv'
        ]
    ];
}