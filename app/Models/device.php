<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class device extends Model
{
    use HasFactory;
    protected $fillable = ['device_name', 'min_value', 'max_value'];

    public $timestamps = true;
    public function Log():BelongsTo
    {
        return $this->belongsTo(log::class);
    }
}
