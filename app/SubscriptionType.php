<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubscriptionType extends Model
{
    use SoftDeletes;

    public $table = 'subscription_types';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'num_month',
        'amount',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'type_id', 'id');
    }

}
