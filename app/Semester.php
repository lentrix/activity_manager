<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = ['prefix', 'accronym', 'semester', 'sem_code'];

}
