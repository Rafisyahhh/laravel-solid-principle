<?php

namespace App\Base\Interfaces;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasEducation
{
    /**
     * One-to-Many relationship with Education Model
     *
     * @return BelongsTo
     */

    public function education(): BelongsTo;
}
