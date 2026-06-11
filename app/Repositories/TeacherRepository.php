<?php
namespace App\Repositories;

use App\Models\Teacher;

class TeacherRepository
{
    public function getAll()
    {
        return Teacher::with('classroom')
            ->latest()
            ->get();
    }

    public function findById(int $id)
    {
        return Teacher::with('classroom')->findOrFail($id);
    }

    public function create(array $data)
    {
        return Teacher::create($data);
    }

    public function update(Teacher $teacher, array $data)
    {
        $teacher->update($data);

        return $teacher;
    }

    public function delete(Teacher $teacher)
    {
        return $teacher->delete();
    }
}