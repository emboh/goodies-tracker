<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use HasFactory;
    
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'quantity_in',
        'quantity_out',
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * @return HasMany
     */
    public function histories() : HasMany
    {
        return $this->hasMany(History::class);
    }

    /**
     * @return int
     */
    public function getQuantityInAttribute()
    {
        return $this->histories->sum('quantity_in');
    }

    /**
     * @return int
     */
    public function getQuantityOutAttribute()
    {
        return $this->histories->sum('quantity_out');
    }

    /**
     * Add item stocks.
     *
     * @param  int  $quantity
     * @return void
     */
    public function addStocks($quantity)
    {
        $this->increment('stock', $quantity);

        $this->histories()->create([
            'quantity_in' => $quantity,
            'user_id' => request()->user()->id
        ]);
    }

    /**
     * Reduce item stocks.
     *
     * @param  int  $quantity
     * @return void
     */
    public function reduceStocks($quantity)
    {
        $this->decrement('stock', $quantity);

        $this->histories()->create([
            'quantity_out' => $quantity,
            'user_id' => request()->user()->id
        ]);
    }
}
