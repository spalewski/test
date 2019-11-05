<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function Customer(){

        return $this->belongsTo('Customer', 'customer_id');
    }




    protected $hidden = [
      'id',  'created_at', 'updated_at'
    ];
}
