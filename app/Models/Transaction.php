<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'note',
        'total_price',
        'total_discounted',
        'payment_method',
        'status',
        'outlet_id',
        'is_delivery'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];

    /**
     * Append custom attribute to object on load.
     *
     * @var array<string, string>
     */
    protected $appends = [
        'totalPriceIdn',
        'createdAtIdn',
    ];

    /**
     * Style total price on id currency
     */
    public function getTotalPriceIdnAttribute()
    {
        return number_format($this->total_price, 0, ',', '.');
    }

    /**
     * Style created at as indo china format
     */
    public function getCreatedAtIdnAttribute()
    {
        return $this->created_at->format('d-m-Y H:i:s');
    }

    /**
     * Get all of the models that create transactions.
     */
    public function transactable()
    {
        return $this->morphTo();
    }

    /**
     * Get the outlet where the staff work.
     */
    public function outlet(): BelongsTo
    {
        return $this->belongsTo(Outlet::class);
    }

    /**
     * Get the product list that owns by cart.
     */
    public function details(): HasMany
    {
        return $this->hasMany(CartDetail::class);
    }

}
