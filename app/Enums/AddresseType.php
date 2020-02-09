<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static ACTION()
 * @method static static VOLUNTARY()
 * @method static static ONG()
 */
final class AddresseType extends Enum
{
    const ACTION = 'ACTION';
    const VOLUNTARY = 'VOLUNTARY';
    const ONG = 'ONG';

}
