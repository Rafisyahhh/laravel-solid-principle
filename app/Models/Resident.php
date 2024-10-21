<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Resident extends Model
{
    use HasFactory;
    public $guarded = [];
    protected $table = 'residents';
    protected $primaryKey = 'id';

    /**
     * One-to-Many relationship with Article Category Model
     *
     * @return BelongsTo
     */
    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class );
    }
    /**
     * One-to-Many relationship with Article Category Model
     *
     * @return BelongsTo
     */
    public function education(): BelongsTo
    {
        return $this->belongsTo(Education::class );
    }
    /**
     * One-to-Many relationship with Article Category Model
     *
     * @return BelongsTo
     */
    public function work(): BelongsTo
    {
        return $this->belongsTo(Work::class );
    }
    /**
     * One-to-Many relationship with Article Category Model
     *
     * @return BelongsTo
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class,);
    }
}
