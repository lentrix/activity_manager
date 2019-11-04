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
}
