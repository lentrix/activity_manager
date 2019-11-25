<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = ['title','description','starts','ends','semester_id'];

    protected $dates = ['starts', 'ends'];

    public function semester() {
        return $this->belongsTo('App\Semester');
    }

    public function attScheds() {
        return $this->hasMany('App\AttSched');
    }
}
