<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncomeSingle extends Model
{
    protected $fillable = [
        'amount',
        'date',
    ];
    /**
     * Mutator to whole currency.subcurrency (i.e. cents -> dollars.cents)
     *
     * @param $amount
     *
     * @return float|int
     */
    public function getAmountAttribute($amount)
    {
        return $amount / 100;
    }

    /**
     * Mutator from whole currency to subcurrency (i.e. dollars.cents -> cents)
     *
     * @param $amount
     *
     * @return float|int
     */
    public function setAmountAttribute($amount)
    {
        return $amount * 100;
    }

    /**
     * User relationshop
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo('App\User');
    }
}
