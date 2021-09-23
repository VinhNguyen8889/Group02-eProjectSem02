<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSubject extends Model
{
    public function fee_detail(){
    	return $this->belongsTo(SubjectFeeLog::class,'id','subject_id')->orderBy('effective_date', 'desc');
    }
}
