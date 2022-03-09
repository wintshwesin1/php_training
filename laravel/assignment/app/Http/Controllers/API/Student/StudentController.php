<?php

namespace App\Http\Controllers\API\Student;

use App\Http\Controllers\Controller;
use App\Contracts\Services\Student\StudentServiceInterface;
use App\Http\Requests\StudentCreateAPIRequest;
use App\Http\Requests\StudentEditAPIRequest;
use Illuminate\Http\Request;
use Validator;
use App\Models\Student;
use App\Http\Resources\StudentResource;
use Carbon\Carbon;

class StudentController extends Controller
{
    /**
     * User Interface
     */
    private $studentInterface;

    /**
     * Create a new controller instance.
     * @param UserServiceInterface $userServiceInterface
     * @return void
     */
    public function __construct(StudentServiceInterface $studentServiceInterface)
    {
        $this->studentInterface = $studentServiceInterface;
    }

    /**
     * Display a listing of the student.
     *
     * @return \Illuminate\Http\Response
     */
    public function showStudentList()
    {
        $data = Student::get();
        return response()->json([StudentResource::collection($data), 'Students fetched.']);
    }

    /**
     * This is to create student that request via api.
     * @param StudentCreateAPIRequest $request Request via api
     * @return Response json response
     */
    public function createStudent(StudentCreateAPIRequest $request)
    {
        $request->validated();
        $student = $this->studentInterface->saveStudent($request);
        return response()->json(['Student created successfully.', new StudentResource($student)]);
    }

    /**
     * To get student by id via API
     * @param string $studentId student id
     * @return Response json student object
     */
    public function getStudentById($studentId)
    {
        $student = $this->studentInterface->getStudentById($studentId);
        if (is_null($student)) {
            return response()->json('Student not found', 404); 
        }
        return response()->json([new StudentResource($student)]);
    }

    /**
     * To Update student via API
     * @param StudentEditAPIRequest $request request via API
     * @param string $studentId student id
     * @return Response json updated student.
     */
    public function updateStudent(StudentEditAPIRequest $request, $studentId)
    {
        $request->validated();
        $student = $this->studentInterface->updatedStudentById($request,$studentId);
        return response()->json(['Student updated successfully.', new StudentResource($student)]);
    }

    /**
     * To get student by id via API
     * @param string $studentId student id
     * @return Response json student object
     */
    public function deleteStudentById($studentId)
    {
        $msg = $this->studentInterface->deleteStudentById($studentId);
        return response()->json($msg);
    }
}
