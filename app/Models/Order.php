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
        'pickup_id',
        'nama',
        'latitude',
        'longitude',
        'alamat',
        'detail',
        'no_hp',
        'request_order',
        'biaya_rq',
        'jarak',
        'ongkir',
        'total',
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
