<?php

namespace App\Services;

use App\Models\Student;
use App\Repositories\StudentRepository;
use App\Repositories\ClassroomRepository;

class StudentService
{
    protected StudentRepository $studentRepository;
    protected ClassroomRepository $classroomRepository;

    public function __construct(StudentRepository $studentRepository, ClassroomRepository $classroomRepository)
    {
        $this->studentRepository = $studentRepository;
        $this->classroomRepository = $classroomRepository;
    }
    public function getAllStudents()
    {
        return $this->studentRepository->getAll();
    }

    public function getStudentById(int $id)
    {
        return $this->studentRepository->findById($id);
    }

    public function createStudent(array $data)
    {
        $this->ensureClassroomHasAvailableCapacity(
            $data['classroom_id']
        );

        return $this->studentRepository->create($data);
    }

    public function updateStudent(Student $student, array $data)
    {
        if ($student->classroom_id != $data['classroom_id']) {
            $this->ensureClassroomHasAvailableCapacity(
                $data['classroom_id']
            );
        }
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

    private function ensureClassroomHasAvailableCapacity(int $classroomId): void
    {
        $classroom = $this->classroomRepository
            ->findById($classroomId);

        $studentsCount = $classroom
            ->students()
            ->count();

        if ($studentsCount >= $classroom->capacity) {

            throw new \DomainException(
                'This classroom has reached its maximum capacity.'
            );
        }
    }

    public function getPaginatedStudents(?string $search = null)
    {
        return $this->studentRepository
            ->paginate(10, $search);
    }
}