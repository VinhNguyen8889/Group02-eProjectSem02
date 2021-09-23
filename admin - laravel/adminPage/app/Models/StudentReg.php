<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentReg extends Model
{
    public function class(){
        return $this->belongsTo(StudentClass::class,'class_id','id');
    }

    public function student(){
        return $this->belongsTo(User::class,'student_id','id');
    }

}
