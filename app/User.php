<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Account Relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accounts() {
        return $this->hasMany('App\Account');
    }

    /**
     * Transaction Relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions() {
        return $this->hasMany('App\Transaction');
    }

    /**
     * Bill Relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bills() {
        return $this->hasMany('App\Bill'); // :(
    }

    /**
     * Single Income relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function incomeSingles() {
        return $this->hasMany('App\IncomeSingle');
    }

    /**
     * Recurring income relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function incomeRecurrings() {
        return $this->hasMany('App\IncomeRecurring');
    }

    /**
     * Expense relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function expenses() {
        return $this->hasMany('App\Expense');
    }
}
