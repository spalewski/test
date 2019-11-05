<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Transaction extends Model
{

    public function Transaction()
    {
    }


    use Notifiable;

    protected $fillable = [
        'customer_id', 'transaction_value', 'transaction_code', 'notes'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

}
