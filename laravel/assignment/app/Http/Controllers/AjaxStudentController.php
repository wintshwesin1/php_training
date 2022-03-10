<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Major;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentsImport;
use App\Exports\StudentsExport;
use Illuminate\Support\Facades\DB;

class AjaxStudentController extends Controller
{

    /**
     * To show student list
     *
     * @return View student list
     */
    public function showStudentList()
    {
        return view('ajax.students.index');
    }

    /**
     * To show student create view
     *
     * @return View student view
     */
    public function showStudentCreateView()
    {
        $majors = Major::get();
        return view('ajax.students.create',compact('majors'));
    }
}
