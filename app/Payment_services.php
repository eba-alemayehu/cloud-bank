<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment_services extends Model
{
    protected $fillable = [
        'busyness_phone',
        'busyness_email',
        'busyness_region',
        'busyness_city',
        'busyness_zoon_or_subcity',
        'busyness_woreda',
        'website',
        'API_key',
        'listener_url',
        'customer_id',
        'merchent_id'
    ];


}
