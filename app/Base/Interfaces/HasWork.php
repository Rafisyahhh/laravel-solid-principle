<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasWork
{
    /**
     * One-to-Many relationship with Work Model
     *
     * @return BelongsTo
     */

    public function work(): BelongsTo;
}
