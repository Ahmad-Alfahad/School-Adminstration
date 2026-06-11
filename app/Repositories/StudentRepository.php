<?php

namespace App\Repositories;

use App\Models\Student;

class StudentRepository
{
    public function getAll()
    {
        return Student::with('classroom')
            ->latest()
            ->get();
    }

    public function findById($id)
    {
        return Student::findOrFail($id);
    }

    public function create(array $data)
    {
        return Student::create($data);
    }

    public function update(Student $student, array $data)
    {
        $student->update($data);

        return $student;
    }

    public function delete(Student $student)
    {
        return $student->delete();
    }
}