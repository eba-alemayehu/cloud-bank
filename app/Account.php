<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['balance', 'account_type_id', 'customer_id'];
}
