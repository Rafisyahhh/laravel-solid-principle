<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasAddress
{
    /**
     * One-to-Many relationship with Address Model
     *
     * @return BelongsTo
     */

    public function address(): BelongsTo;
}
