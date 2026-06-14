<?php

namespace App\Repositories;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Classroom;

class DashboardRepository
{
    public function getStatistics(): array
    {
        return [
            'students_count' => Student::count(),
            'teachers_count' => Teacher::count(),
            'classrooms_count' => Classroom::count(),
            'total_capacity' => Classroom::sum('capacity'),
        ];
    }

    public function getRecentStudents(int $limit = 5)
    {
        return Student::with('classroom')
            ->latest()
            ->take($limit)
            ->get();
    }
    public function getRecentTeachers(int $limit = 5)
    {
        return Teacher::with('classroom')
            ->latest()
            ->take($limit)
            ->get();
    }
    public function getClassroomDistribution()
    {
        return Classroom::withCount('students')
            ->orderBy('students_count', 'desc')
            ->get();
    }
}