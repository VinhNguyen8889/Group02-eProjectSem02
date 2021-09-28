<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\User;
use App\Models\StudentReg;

class TransactionExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('school\student\student_reg\all_transaction_export', [
            'regs' => StudentReg::latest()->get()
        ]);
    }
}
