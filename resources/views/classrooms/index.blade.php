<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 py-2">
            <div>
                <h2 class="font-bold text-2xl text-slate-800 dark:text-slate-100 leading-tight">
                    {{ __('Classrooms') }}
                </h2>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                    Manage school sections, student capacities, and basic classroom data.
                </p>
            </div>

            <a href="{{ route('classrooms.create') }}"
                class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl shadow-sm hover:shadow transition-all duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>Add Classroom</span>
            </a>
        </div>
    </x-slot>

    <div class="py-1 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div
            class="mb-3 bg-white dark:bg-slate-900 p-4 border border-slate-200 dark:border-slate-800 rounded-2xl shadow-sm">

            <form method="GET" action="{{ route('classrooms.index') }}">

                <div class="flex flex-col md:flex-row gap-3 items-center">

                    <div class="relative w-full flex-1">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400 dark:text-slate-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>

                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Search by classroom name ..."
                            class="w-full pl-11 pr-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-slate-800 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-500 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 focus:bg-white dark:focus:bg-slate-800 transition-all duration-200">
                    </div>

                    <div class="flex gap-2 w-full md:w-auto shrink-0">

                        <button type="submit"
                            class="w-full md:w-auto inline-flex items-center justify-center px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold rounded-xl shadow-sm hover:shadow transition-all duration-200 focus:ring-2 focus:ring-emerald-500/20 cursor-pointer">
                            Search
                        </button>

                        @if(request('search'))
                            <a href="{{ route('classrooms.index') }}"
                                class="w-full md:w-auto inline-flex items-center justify-center px-5 py-2.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-300 text-sm font-semibold rounded-xl shadow-sm hover:bg-slate-50 dark:hover:bg-slate-700/60 transition-all duration-200 focus:ring-2 focus:ring-slate-500/10">
                                Clear
                            </a>
                        @endif

                    </div>

                </div>

            </form>

        </div>
        <div
            class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl shadow-sm overflow-hidden">

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr
                            class="bg-slate-50 dark:bg-slate-800/60 border-b border-slate-200 dark:border-slate-800 text-slate-500 dark:text-slate-400">
                            <th class="p-4 text-xs font-bold uppercase tracking-wider w-28">Class Id</th>
                            <th class="p-4 text-xs font-bold uppercase tracking-wider">Class Name</th>
                            <th class="p-4 text-xs font-bold uppercase tracking-wider">Max Capacity</th>
                            <th class="p-4 text-xs font-bold uppercase tracking-wider"> Occupancy</th>
                            <th class="p-4 text-xs font-bold uppercase tracking-wider text-right pr-6">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800 text-slate-700 dark:text-slate-300">
                        @forelse($classrooms as $classroom)
                            <tr class="hover:bg-slate-50/70 dark:hover:bg-slate-800/30 transition-colors duration-150">

                                <td class="p-4 text-sm font-semibold text-slate-400 dark:text-slate-500">
                                    #{{ $classroom->id }}
                                </td>

                                <td class="p-4 text-sm font-semibold text-slate-900 dark:text-slate-100">
                                    {{ $classroom->name }}
                                </td>

                                <td class="p-4 text-sm">
                                    <span
                                        class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-xs font-semibold bg-emerald-50 dark:bg-emerald-950/30 text-emerald-700 dark:text-emerald-400">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                        {{ $classroom->capacity }} Max Seats
                                    </span>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    @php
                                        $isFull = $classroom->students_count >= $classroom->capacity;
                                    @endphp
                                    <span
                                        class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-xs font-bold {{ $isFull ? 'bg-rose-50 text-rose-700 border border-rose-100 dark:bg-rose-950/30 dark:text-rose-400 dark:border-rose-900/40' : 'bg-emerald-50 text-emerald-700 border border-emerald-100 dark:bg-emerald-950/30 dark:text-emerald-400 dark:border-emerald-900/40' }}">
                                        <span
                                            class="w-1.5 h-1.5 rounded-full {{ $isFull ? 'bg-rose-500' : 'bg-emerald-500' }}"></span>
                                        {{ $classroom->students_count }} / {{ $classroom->capacity }} Enrolled
                                    </span>
                                </td>

                                <td class="p-4 text-sm text-right pr-6">
                                    <div class="inline-flex items-center gap-2 justify-end">

                                        <x-tables.crud-actions :show="route('classrooms.show', $classroom)"
                                            :edit="route('classrooms.edit', $classroom)"
                                            :delete="route('classrooms.destroy', $classroom)"
                                            confirmMessage="Are you sure you want to delete this classroom?" />


                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="p-16 text-center text-slate-400 dark:text-slate-500">
                                    <div class="flex flex-col items-center justify-center gap-3">
                                        <div
                                            class="p-4 bg-slate-50 dark:bg-slate-800 rounded-full text-slate-300 dark:text-slate-600">
                                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                                </path>
                                            </svg>
                                        </div>
                                        <span class="text-base font-medium text-slate-500">No classrooms created yet</span>
                                        <p class="text-xs text-slate-400 max-w-xs">Get started by creating your first school
                                            section to assign teachers and students.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                @if($classrooms->hasPages())
                    <div
                        class="flex justify-end bg-white dark:bg-slate-900 px-3 py-1.5 border border-slate-200 dark:border-slate-800 rounded-2xl shadow-sm custom-pagination">
                        {{ $classrooms->links() }}
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>