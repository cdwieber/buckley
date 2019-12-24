<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Account
 * @package App
 */
class Account extends Model
{
    protected $fillable = [
        'nickname',
        'institution',
        'type',
        'is_liabiltiy',
        'max',
        'interest',
        'balance',
        'user_id',
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

    /**
     * Transaction relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions() {
        return $this->hasMany('App\Transaction');
    }
}
