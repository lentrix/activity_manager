<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['id', 'lname','fname','program','year'];

    public function studSems() {
        return $this->hasMany('App\StudSem');
    }

    public static function add($data) {
        $st = static::find($data['idnum']);

        if($st==null) {
            Student::create([
                'id' => $data['idnum'],
                'lname' => $data['lname'],
                'fname' => $data['fname'],
                'program' => $data['cr_acrnm'],
                'year' => $data['year'],
            ]);
        }
    }

    public function getCurrentAccountAttribute() {
        return  StudSem::where('student_id', $this->id)
                    ->where('semester_id', Semester::getActive()->id)
                    ->first();
    }

    public function getFullNameAttribute() {
        return $this->lname . ", " . $this->fname;
    }
}
