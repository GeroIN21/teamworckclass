<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    //
    protected $table = 'Queues';
    protected $fillable = [
        'id', 
        'firstName',
        'lastName',
        'libCardNumber',
        'resDateBegin',
        'resDateEnd',
        'duration',
        'seatsQuantity'
    ];
}
