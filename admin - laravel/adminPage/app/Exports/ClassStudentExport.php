<?php

namespace App\Exports;


use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\StudentReg;
use App\Models\User;

class ClassStudentExport implements FromView
{

    public function __construct(int $class_id)
    {
        $this->class_id = $class_id;
    }

    public function view(): View
    {
        return view('school\student\student_management\all_list_export', [
            'students' => StudentReg::select('student_id','mark')->where('class_id',$this->class_id)->latest()->get()
        ]);
    }
}