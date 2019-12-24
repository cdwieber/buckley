<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = [
        'amount',
        'first_date',
        'next_date',
        'last_date',
        'rrule'
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
        return $this->BelongsTo('App\User');
    }
}
