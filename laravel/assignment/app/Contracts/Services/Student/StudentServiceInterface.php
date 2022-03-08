<?php

namespace App\Contracts\Services\Student;

use Illuminate\Http\Request;

/**
 * Interface for student service
 */
interface StudentServiceInterface
{
    /**
     * To save student
     * @param Request $request request with inputs
     * @return Object $student saved student
     */
    public function saveStudent(Request $request);

    /**
     * To get student list
     * @return array $studentList Student list
     */
    public function getStudentList();

    /**
     * To delete student by id
     * @param string $id student id
     * @return string $message message success or not
     */
    public function deleteStudentById($id);

    /**
     * To get student by id
     * @param string $id student id
     * @return Object $student student object
     */
    public function getStudentById($id);


    /**
     * To update student by id
     * @param Request $request request with inputs
     * @param string $id Student id
     * @return Object $student student Object
     */
    public function updatedStudentById(Request $request, $id);

    /**
     * To get student data with inputs
     * @param Request $request request with inputs
     * @return array $studentList Student list
     */
    public function getSearchStudentInfo(Request $request);

}
