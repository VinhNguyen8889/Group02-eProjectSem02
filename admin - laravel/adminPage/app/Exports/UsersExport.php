<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
// use App\Models\StudentClass;
use App\Models\User;

class UsersExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('school\student\student_reg\all_reg_list_export', [
            'students' => User::where('usertype','Student')->latest()->get()
        ]);
    }

}

