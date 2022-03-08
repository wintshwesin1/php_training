<?php

namespace App\Services\Student;

use App\Contracts\Dao\Student\StudentDaoInterface;
use App\Contracts\Services\Student\StudentServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 * Service class for student.
 */
class StudentService implements StudentServiceInterface
{
    /**
     * student dao
     */
    private $studentDao;

    /**
     * Class Constructor
     * @param StudentDaoInterface
     * @return
     */
    public function __construct(StudentDaoInterface $studentDao)
    {
        $this->studentDao = $studentDao;
    }

    /**
     * To save student
     * @param Request $request request with inputs
     * @return Object $student saved student
     */
    public function saveStudent(Request $request)
    {
        return $this->studentDao->saveStudent($request);
    }

    /**
     * To get student list
     * @return array $studentList Student list
     */
    public function getStudentList()
    {
        return $this->studentDao->getStudentList();
    }

    /**
     * To delete student by id
     * @param string $id student id
     * @return string $message message success or not
     */
    public function deleteStudentById($id)
    {
        return $this->studentDao->deleteStudentById($id);
    }

    /**
     * To get student by id
     * @param string $id student id
     * @return Object $student student object
     */
    public function getStudentById($id)
    {
        return $this->studentDao->getStudentById($id);
    }

    /**
     * To update student by id
     * @param Request $request request with inputs
     * @param string $id Student id
     * @return Object $student Student Object
     */
    public function updatedStudentById(Request $request, $id)
    {
        return $this->studentDao->updatedStudentById($request, $id);
    }

    /**
     * To get student data with inputs
     * @param Request $request request with inputs
     * @return Object $student Student Object
     */
    public function getSearchStudentInfo(Request $request)
    {
        return $this->studentDao->getSearchStudentInfo($request);
    }
}
