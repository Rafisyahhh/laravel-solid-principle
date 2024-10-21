<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;
    public $guarded = [];
    protected $table = 'works';
    protected $primaryKey = 'id';

}
