<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static EMAIL()
 * @method static static PHONE()
 * @method static static NETWORK()
 * @method static static FACEBOOK()
 * @method static static INSTAGRAM()
 * @method static static WHATSAPP()
 * @method static static YOUTUBE()
 */
final class ContactType extends Enum
{
    const EMAIL = "EMAIL";
    const PHONE = "PHONE";
    const NETWORK = "NETWORK";
    const FACEBOOK = "FACEBOOK";
    const INSTAGRAM = "INSTAGRAM";
    const WHATSAPP = "WHATSAPP";
    const YOUTUBE = "YOUTUBE";
}
