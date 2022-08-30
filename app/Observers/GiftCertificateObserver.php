<?php

namespace App\Observers;

use App\Models\Orders\GiftCertificate;
use Illuminate\Support\Str;

class GiftCertificateObserver
{
    public function creating(GiftCertificate $giftCertificate){
        $giftCertificate->offsetUnset('quantity');
        $giftCertificate->code = $giftCertificate->code ?? Str::random(6);
    }
}
