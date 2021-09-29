<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectFeeLog extends Model
{
    public function fee_subject(){
    	return $this->belongsTo(StudentSubject::class,'subject_id','id');
    }
}
