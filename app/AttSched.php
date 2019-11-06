<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttSched extends Model
{
    protected $dates = ['open', 'close'];
    protected $fillable = ['activity_id', 'label', 'fine', 'open', 'close'];

    public function activity() {
        return $this->belongsTo('App\Activity');
    }

    public static function getActive() {
        return static::whereHas('activity', function($query) {
            return $query->where('semester_id', Semester::getActive()->id);
        })->with('activity')->get();
    }

    public function attChecks() {
        return $this->hasMany('App\AttCheck');
    }

    public function attCheck(StudSem $studSem) {
        return AttCheck::where('att_sched_id', $this->id)
                    ->where('stud_sem_id', $studSem->id)
                    ->first();
    }
}
