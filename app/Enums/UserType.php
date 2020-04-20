<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static VOLUNTARY()
 * @method static static ONG()
 */
final class UserType extends Enum
{
    const VOLUNTARY = 1;
    const ONG = 2;
}
