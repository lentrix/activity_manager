<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttSched extends Model
{
    protected $fillable = ['activity_id', 'label', 'open', 'close'];

}
