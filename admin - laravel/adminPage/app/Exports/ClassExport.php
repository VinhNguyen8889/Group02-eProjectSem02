<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\StudentClass;
use App\Models\User;
use Auth;

class ClassExport implements FromView
{

    public function view(): View
    {

        if(Auth::user()->usertype !== 'Teacher'){
        return view('school\student\student_management\class_list_export', [
            'classes' => StudentClass::latest()->get()
        ]);} else {
            return view('school\student\student_management\class_list_export', [
                'classes' => StudentClass::where('teacher_id',Auth::user()->id)->latest()->get()
            ]);
        }
    }
}