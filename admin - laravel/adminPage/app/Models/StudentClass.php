<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    public function class_year(){
        return $this->belongsTo(StudentYear::class,'year_id','id');
    }

    public function class_day(){
        return $this->belongsTo(StudentDay::class,'day_id','id');
    }

    public function class_group(){
        return $this->belongsTo(StudentGroup::class,'group_id','id');
    }

    public function class_shift(){
        return $this->belongsTo(StudentShift::class,'shift_id','id');
    }

    public function class_subject(){
        return $this->belongsTo(StudentSubject::class,'subject_id','id');
    }

    public function class_teacher(){
        return $this->belongsTo(User::class,'teacher_id','id');
    }
}
