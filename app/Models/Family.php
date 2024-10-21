<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Family extends Model
{
    use HasFactory;
    public $guarded = [];
    protected $table = 'families';
    protected $primaryKey = 'id';

    /**
     * One-to-Many relationship with Article Category Model
     *
     * @return BelongsTo
     */
    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'address_id');
    }
}
