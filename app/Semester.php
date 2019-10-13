<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = ['prefix', 'accronym', 'semester', 'sem_code'];

    public static function getActive() {
        return static::where('active',1)->first();
    }
}
