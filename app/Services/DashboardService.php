<?php

namespace App\Services;

use App\Repositories\DashboardRepository;
class DashboardService
{
    protected DashboardRepository $dashboardRepository;
    public function __construct(DashboardRepository $dashboardRepository)
    {
        $this->dashboardRepository = $dashboardRepository;
    }

    public function getDashboardData(): array
    {
        return [
            'statistics' => $this->dashboardRepository->getStatistics(),
            'recentStudents' => $this->dashboardRepository->getRecentStudents(),
            'recentTeachers' => $this->dashboardRepository->getRecentTeachers(),
            'classroomDistribution' => $this->dashboardRepository->getClassroomDistribution(),
        ];
    }
}