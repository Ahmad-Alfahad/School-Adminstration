<?php

namespace App\Services;

use App\Models\Teacher;
use App\Repositories\TeacherRepository;

class TeacherService
{
    protected TeacherRepository $teacherRepository;

    public function __construct(TeacherRepository $teacherRepository)
    {
        $this->teacherRepository = $teacherRepository;
    }
    public function getAllTeachers()
    {
        return $this->teacherRepository->getAll();
    }

    public function getTeacherById(int $id)
    {
        return $this->teacherRepository->findById($id);
    }

    public function createTeacher(array $data)
    {
        return $this->teacherRepository->create($data);
    }

    public function updateTeacher(Teacher $teacher, array $data)
    {
        return $this->teacherRepository->update(
            $teacher,
            $data
        );
    }

    public function deleteTeacher(Teacher $teacher)
    {
        return $this->teacherRepository->delete(
            $teacher
        );
    }

    public function getPaginatedTeachers(?string $search = null)
    {
        return $this->teacherRepository
            ->paginate(
                10,
                $search
            );
    }
}