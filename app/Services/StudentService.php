<?php

namespace App\Services;

use App\Models\Student;
use App\Repositories\StudentRepository;

class StudentService
{
    protected $studentRepository;

    public function __construct( StudentRepository $studentRepository) 
    {
        $this->studentRepository = $studentRepository;
    }
    public function getAllStudents()
    {
        return $this->studentRepository->getAll();
    }

    public function getStudentById($id)
    {
        return $this->studentRepository->findById($id);
    }

    public function createStudent(array $data)
    {
        return $this->studentRepository->create($data);
    }

    public function updateStudent(Student $student, array $data)
    {
        return $this->studentRepository->update(
            $student,
            $data
        );
    }

    public function deleteStudent(Student $student)
    {
        return $this->studentRepository->delete(
            $student
        );
    }
}