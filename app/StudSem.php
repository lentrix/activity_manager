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
        })->where('open','<', \Carbon\Carbon::now())
        ->with('activity')->get();
    }

    public static function stats() {
        $stats = [];

        if(!$activeSem = Semester::getActive()) {
            return [
                'total'=>0,
                '1'=>0,
                '2'=>0,
                '3'=>0,
                '4'=>0,
                'Q'=>0,
            ];
        }

        $stats['total'] = static::where('semester_id', $activeSem->id)->count();
        $levels = ['1','2','3','4','Q'];

        $stats['1'] = static::where('semester_id', Semester::getActive()->id)
                        ->whereHas('student', function($query){
                            return $query->where('year', '1');
                        })->count();
        $stats['2'] = static::where('semester_id', Semester::getActive()->id)
                        ->whereHas('student', function($query){
                            return $query->where('year', '2');
                        })->count();
        $stats['3'] = static::where('semester_id', Semester::getActive()->id)
                        ->whereHas('student', function($query){
                            return $query->where('year', '3');
                        })->count();
        $stats['4'] = static::where('semester_id', Semester::getActive()->id)
                        ->whereHas('student', function($query){
                            return $query->where('year', '4');
                        })->count();
        $stats['Q'] = static::where('semester_id', Semester::getActive()->id)
                        ->whereHas('student', function($query){
                            return $query->where('year', 'Q');
                        })->count();

        return $stats;
    }
}
