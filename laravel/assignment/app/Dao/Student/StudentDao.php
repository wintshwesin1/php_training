<?php

namespace App\Dao\Student;

use App\Models\Student;
use App\Contracts\Dao\Student\StudentDaoInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

/**
 * Data accessing object for student
 */
class StudentDao implements StudentDaoInterface
{
    /**
     * To save student
     * @param Request $request request with inputs
     * @return Object $student saved student
     */
    public function saveStudent(Request $request)
    {
        $student = new Student();
        $student->name = $request['name'];
        $student->major_id = $request['major'];
        $student->phone = $request['phone'];
        $student->email = $request['email'];
        $student->address = $request['address'];
        $student->save();
        return $student;
    }

    /**
     * To get student list
     * @return array $students Student list
     */
    public function getStudentList()
    {
        $students = Student::with('major')->latest()->paginate(10);
        return $students;
    }

    /**
     * To delete student by id
     * @param string $id student id
     * @return string $message message success or not
     */
    public function deleteStudentById($id)
    {
        $student = Student::find($id);
        if ($student) {
            $student->deleted_at = Carbon::now()->timestamp;
            $student->save();
            $student->delete();
            return 'Deleted Successfully!';
        }
        return 'Student Not Found!';
    }

    /**
     * To get student by id
     * @param string $id student id
     * @return Object $student student object
     */
    public function getStudentById($id)
    {
        $student = Student::find($id);
        return $student;
    }

    /**
     * To update student by id
     * @param Request $request request with inputs
     * @param string $id Student id
     * @return Object $student Student Object
     */
    public function updatedStudentById(Request $request, $id)
    {
        $student = Student::find($id);
        $student->name = $request['name'];
        $student->major_id = $request['major'];
        $student->phone = $request['phone'];
        $student->email = $request['email'];
        $student->address = $request['address'];
        $student->updated_at = Carbon::now()->timestamp;
        $student->save();
        return $student;
    }

}
