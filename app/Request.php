<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        'batch_id',
        'user_email',
        'sample_id'
    ];
}
