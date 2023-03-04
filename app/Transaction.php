<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    public $table = 'transactions';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'transaction_date',
    ];

    protected $fillable = [
        'user_id',
        'transaction_type_id',
        'amount',
        'transaction_date',
        'paymentType',
        'paymentBrand',
        'currency',
        'descriptor',
        'merchantTransactionId',
        'status_code',
        'status_online_payment',
        'card_bin',
        'card_binCountry',
        'card_last4Digits',
        'card_holder',
        'card_expiryMonth',
        'card_expiryYear',
        'customer_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_surname',
        'customer_ip',
        'customer_ipCountry',
        'checkout_id',
        'buildNumber',
        'date',
        'ndc',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
