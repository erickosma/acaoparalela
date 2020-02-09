<?php

namespace App\Enums;

use BenSampo\Enum\Contracts\LocalizedEnum;
use BenSampo\Enum\Enum;

/**
 * @method static static ASSISTANCE()
 * @method static static GALLERY()
 * @method static static ONG()
 * @method static static VOLUNTARY()
 */
final class ImageType extends Enum implements LocalizedEnum
{
    const ASSISTANCE = "ASSISTANCE";
    const GALLERY = "GALLERY";
    const ONG = "ONG";
    const VOLUNTARY = "VOLUNTARY";
}
