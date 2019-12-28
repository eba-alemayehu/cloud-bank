<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regular_transaction extends Model
{
    protected $fillable = [
        'transaction_id',
        "account_number",
        "customer_id"
    ];        
}
