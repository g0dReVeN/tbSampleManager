<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'nhlsid',
        'firstname',
        'surname',
        'sex',
        'dateofbirth',
        'idcheck',
    ];

    public function samples() {
        
        return $this->hasMany(Sample::class);
    }

    public static function boot() {
        parent::boot();

        static::deleting(function($user) {
             $user->samples()->delete();
        });
    }
}
