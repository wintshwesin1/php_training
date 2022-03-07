<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Services\Student\StudentServiceInterface;
use App\Http\Requests\StudentCreateRequest;
use App\Http\Requests\StudentEditRequest;
use App\Models\Student;
use App\Models\Major;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentsImport;
use App\Exports\StudentsExport;

class StudentController extends Controller
{
    /**
     * student interface
     */
    private $studentInterface;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StudentServiceInterface $studentServiceInterface)
    {
        $this->studentInterface = $studentServiceInterface;
    }

    /**
     * To show student list
     *
     * @return View student list
     */
    public function showStudentList()
    {
        $students = $this->studentInterface->getStudentList();
        return view('students.index',compact('students'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * To show student create view
     *
     * @return View student view
     */
    public function showStudentCreateView()
    {
        $majors = Major::get();
        return view('students.create',compact('majors'));
    }

    /**
     * To submit student create view
     * @param StudentCreateRequest $request
     * @return View student list
     */
    public function submitStudentCreateView(StudentCreateRequest $request)
    {
        $request->validated();
        $student = $this->studentInterface->saveStudent($request);
        return redirect()->route('students')->with('success','Student created successfully.');
    }
    
    /**
     * Show student edit
     * @param $studentId
     * @return View student edit
     */
    public function showStudentEdit($studentId)
    {
        $majors = Major::get();
        $student = $this->studentInterface->getStudentById($studentId);
        return view('students.create', compact('student','majors'));
    }

    /**
     * Submit student edit
     * @param StudentEditRequest $request
     * @param $studentId
     * @return View student list
     */
    public function submitStudentEditView(StudentEditRequest $request, $studentId)
    {
        $request->validated();
        $student = $this->studentInterface->updatedStudentById($request,$studentId);
        return redirect()->route('students')->with('success','Student updated successfully');
    }

    /**
     * To delete student by id
     * @param $studentId
     * @return View student list
     */
    public function deleteStudentById($studentId)
    {
        $msg = $this->studentInterface->deleteStudentById($studentId);
        return redirect()->route('students')->with('success',$msg);
    }

    /**
     * @return View import view
     */
    public function fileImportExportView()
    {
       return view('students.file-import');
    }
   
    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileExport() 
    {
        return Excel::download(new StudentsExport, 'students.csv');
    }
   
    /**
     * @return View student lists
     */
    public function fileImport() 
    {
        Excel::import(new StudentsImport,request()->file('file'));
        return redirect()->route('students')->with('success','Import data successfully');
    }
}
