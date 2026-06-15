<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 py-2">
            <div>
                <h2 class="font-bold text-2xl text-slate-800 dark:text-slate-100 leading-tight">
                    {{ $classroom->name }}
                </h2>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                    Comprehensive overview of classroom assignments, capacity configurations, and faculty lead.
                </p>
            </div>

            <div class="flex items-center gap-2">
                <a href="{{ route('classrooms.index') }}"
                    class="inline-flex items-center bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 text-slate-700 dark:text-slate-300 text-sm font-semibold px-4 py-2.5 rounded-xl shadow-sm hover:bg-slate-50 dark:hover:bg-slate-800 transition-all">
                    Back to Classrooms
                </a>
                <a href="{{ route('classrooms.edit', $classroom) }}"
                    class="inline-flex items-center bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl shadow-sm transition-all">
                    Edit Classroom
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <div class="lg:col-span-2 space-y-6">

                <div
                    class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl shadow-sm p-6">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mb-3">
                        Classroom Description & Notes
                    </h3>
                    <div
                        class="text-slate-700 dark:text-slate-300 text-sm leading-relaxed prose dark:prose-invert max-w-none">
                        {{ $classroom->description ?? 'No specific description or structural layout notes have been recorded for this classroom container yet.' }}
                    </div>
                </div>

                <div
                    class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl shadow-sm p-6">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mb-4">
                        Student Seating Metrics
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div
                            class="p-4 bg-slate-50 dark:bg-slate-800/40 border border-slate-100 dark:border-slate-800 rounded-xl">
                            <span class="text-xs text-slate-400 dark:text-slate-500 block">Current Registered
                                Students</span>
                            <span class="text-2xl font-black text-slate-800 dark:text-slate-100 mt-1 block">
                                {{ $classroom->students_count }} <span
                                    class="text-sm font-normal text-slate-500">Students Active</span>
                            </span>
                        </div>

                        @php
                            $availableSeats = $classroom->capacity - $classroom->students_count;
                        @endphp
                        <div
                            class="p-4 bg-slate-50 dark:bg-slate-800/40 border border-slate-100 dark:border-slate-800 rounded-xl">
                            <span class="text-xs text-slate-400 dark:text-slate-500 block">Available Seating Safety
                                Limit</span>
                            <span
                                class="text-2xl font-black {{ $availableSeats <= 0 ? 'text-rose-600' : 'text-emerald-600' }} mt-1 block">
                                {{ $availableSeats <= 0 ? 'Full Capacity' : $availableSeats . ' Seats Left' }}
                            </span>
                        </div>
                    </div>
                </div>

            </div>

            <div class="lg:col-span-1 space-y-6">

                <div
                    class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl shadow-sm p-6">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400 dark:text-slate-500 mb-4">
                        Assigned Faculty Lead
                    </h3>

                    @if($classroom->teachers->isNotEmpty())
                        @foreach($classroom->teachers as $teacher)
                            <div class="flex items-center gap-3 p-2 bg-slate-50 dark:bg-slate-800/50 rounded-xl mb-2">
                                <div
                                    class="w-8 h-8 rounded-lg bg-emerald-600 text-white font-bold text-xs flex items-center justify-center uppercase">
                                    {{ strtoupper(substr($teacher->name, 0, 2)) }}
                                </div>
                                <div>
                                    <span class="text-sm font-bold text-slate-900 dark:text-slate-100 block">
                                        {{ $teacher->name }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-xs text-slate-400">No Teachers Assigned</p>
                    @endif
                </div>

            </div>

        </div>
    </div>
</x-app-layout>