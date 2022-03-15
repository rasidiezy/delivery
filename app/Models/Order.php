<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama',
        'latitude',
        'longitude',
        'alamat',
        'detail',
        'berat',
        'no_hp',
    ];

    /**
     * Get the Pickup that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Pickup(): BelongsTo
    {
        return $this->belongsTo(Pickup::class);
    }
}
