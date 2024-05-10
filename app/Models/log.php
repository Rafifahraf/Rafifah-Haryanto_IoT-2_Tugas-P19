<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class log extends Model
{
    use HasFactory;

    protected $fillable = ['device_id', 'current_value'];

    public $timestamps = true;
    public function Device():HasOne{
        return $this->hasOne(device::class, 'id');
    }
}
