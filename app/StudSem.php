<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Semester;

class StudSem extends Model
{
    protected $fillable = ['student_id', 'semester_id'];

    public function semester() {
        return $this->belongsTo('App\Semester');
    }

    public function student() {
        return $this->belongsTo('App\Student');
    }

    public function attChecks() {
        return $this->hasMany('App\AttCheck');
    }

    public static function add($data) {
        $semId = Semester::getActive()->id;

        $ss = static::where('semester_id', $semId)
                ->where('student_id', $data['idnum'])
                ->first();

        if($ss==null) {
            static::create([
                'semester_id' => $semId,
                'student_id' => $data['idnum']
            ]);
        }
    }

    public function present() {
        return AttSched::whereHas('attChecks', function($query) {
            return $query->where('stud_sem_id', $this->id)
                        ->where('valid', 1);
        })->with('activity')->get();
    }

    public function discard() {
        return AttSched::whereHas('attChecks', function($query) {
            return $query->where('stud_sem_id', $this->id)
                        ->where('valid', 0);
        })->with('activity')->get();
    }

    public function absent() {
        return AttSched::whereDoesntHave('attChecks', function($query) {
            return $query->where('stud_sem_id', $this->id);
        })->with('activity')->get();
    }
}
