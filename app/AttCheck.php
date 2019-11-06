<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttCheck extends Model
{
    protected $fillable = ['stud_sem_id', 'att_sched_id', 'check_time','user_id','valid'];

    public static function massInsert($data, $user) {
        $report = [
            'invalidated' => 0,
            'inserted' => 0,
            'duplicate' => 0
        ];

        $semId = Semester::getActive()->id;

        foreach($data as $check) {
            $studSem = StudSem::where('student_id', $check['student_id'])
                        ->where('semester_id', $semId)->first();

            $attSched = AttSched::find($check['att_sched_id']);

            if($studSem!=null && $attSched!=null) {

                if(!static::exists($studSem->id, $check['att_sched_id'])) {

                    $checkTime = \Carbon\Carbon::parse($check['checkTime']);

                    $valid = $attSched->open->lte($checkTime) && $checkTime->lte($attSched->close);

                    static::create([
                        'stud_sem_id' => $studSem->id,
                        'att_sched_id' => $check['att_sched_id'],
                        'check_time' => $check['checkTime'],
                        'user_id' => $user->id,
                        'valid' => $valid
                    ]);
                    $report['inserted']++;
                }else {
                    $report['duplicate']++;
                }
            }else {
                $report['invalidated']++;
            }
        }

        return $report;
    }

    public static function exists($studSemId, $attSchedId) {
        $obj = static::where('stud_sem_id', $studSemId)->where('att_sched_id', $attSchedId)->first();
        return $obj!=null;
    }

    public function attSched() {
        return $this->belongsTo('App\AttSched');
    }

    public function studSem() {
        return $this->belongsTo('App\StudSem');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
