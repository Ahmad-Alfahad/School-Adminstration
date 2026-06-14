<x-app-layout>

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-800">
            School Dashboard
        </h1>

        <p class="text-gray-500 mt-2">
            Overview of your school management system.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        <x-dashboard.stat-card title="Students" :value="$statistics['students_count']" />

        <x-dashboard.stat-card title="Teachers" :value="$statistics['teachers_count']" />


        <x-dashboard.stat-card title="Classrooms" :value="$statistics['classrooms_count']" />


        <x-dashboard.stat-card title="Capacity" :value="$statistics['total_capacity']" />
        

    </div>

</x-app-layout>