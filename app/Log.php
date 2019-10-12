<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = ['user_id','log'];

    public static function add($log) {
        static::create([
            'user_id' => auth()->user()->id,
            'log' => $log
        ]);
    }
}
