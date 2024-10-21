<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasStatus
{
    /**
     * One-to-Many relationship with Status Model
     *
     * @return BelongsTo
     */

    public function status(): BelongsTo;
}
