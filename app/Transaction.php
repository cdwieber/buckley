<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Transaction
 * @package App
 */
class Transaction extends Model
{
    protected $fillable = [
        'amount',
        'description',
        'user_id',
        'account_id',
        'memo',
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
     * User relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo('App\User');
    }
}
