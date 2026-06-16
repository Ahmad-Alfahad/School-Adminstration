<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 py-2">
            <div>
                <h2 class="font-bold text-2xl text-slate-800 dark:text-slate-100 leading-tight">
                    {{ __('Teachers Management') }}
                </h2>
                <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                    Manage faculty members, track their assigned classrooms, and handle academic specializations.
                </p>
            </div>

            <a href="{{ route('teachers.create') }}"
                class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-4 py-2.5 rounded-xl shadow-sm hover:shadow transition-all duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span>Add Teacher</span>
            </a>
        </div>
    </x-slot>

    <div class="py-1 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-3 bg-white dark:bg-slate-900 p-4 border border-slate-200 dark:border-slate-800 rounded-2xl shadow-sm">

    <form method="GET" action="{{ route('teachers.index') }}">

        <div class="flex flex-col md:flex-row gap-3 items-center">

            <div class="relative w-full flex-1">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-slate-400 dark:text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search by teacher name or email..."
                    class="w-full pl-11 pr-4 py-2.5 rounded-xl border border-slate-200 dark:border-slate-700 bg-slate-50/50 dark:bg-slate-800 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-500 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-500/10 focus:bg-white dark:focus:bg-slate-800 transition-all duration-200"
                >
            </div>

            <div class="flex gap-2 w-full md:w-auto shrink-0">

                <button
                    type="submit"
                    class="w-full md:w-auto inline-flex items-center justify-center px-5 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold rounded-xl shadow-sm hover:shadow transition-all duration-200 focus:ring-2 focus:ring-emerald-500/20 cursor-pointer"
                >
                    Search
                </button>

                @if(request('search'))
                    <a
                        href="{{ route('teachers.index') }}"
                        class="w-full md:w-auto inline-flex items-center justify-center px-5 py-2.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-300 text-sm font-semibold rounded-xl shadow-sm hover:bg-slate-50 dark:hover:bg-slate-700/60 transition-all duration-200 focus:ring-2 focus:ring-slate-500/10"
                    >
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
                            <th class="p-4 text-xs font-bold uppercase tracking-wider">Classroom</th>
                            <th class="p-4 text-xs font-bold uppercase tracking-wider">Name</th>
                            <th class="p-4 text-xs font-bold uppercase tracking-wider">Email</th>
                            <th class="p-4 text-xs font-bold uppercase tracking-wider">Phone</th>
                            <th class="p-4 text-xs font-bold uppercase tracking-wider">Specialization</th>
                            <th class="p-4 text-xs font-bold uppercase tracking-wider text-right pr-6">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800 text-slate-700 dark:text-slate-300">
                        @forelse($teachers as $teacher)
                            <tr class="hover:bg-slate-50/70 dark:hover:bg-slate-800/30 transition-colors duration-150">

                                <td class="p-4 text-sm">
                                    <span
                                        class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300">
                                         {{ $teacher->classroom->name ?? 'Not Assigned' }}
                                    </span>
                                </td>

                                <td class="p-4 text-sm font-semibold text-slate-900 dark:text-slate-100">
                                    {{ $teacher->name }}
                                </td>

                                <td class="p-4 text-sm text-slate-600 dark:text-slate-400 lowercase">
                                    {{ $teacher->email }}
                                </td>

                                <td class="p-4 text-sm text-slate-600 dark:text-slate-400">
                                    {{ $teacher->phone ?? '-' }}
                                </td>

                                <td class="p-4 text-sm">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-50 dark:bg-blue-950/40 text-blue-700 dark:text-blue-300 border border-blue-100 dark:border-blue-900/50">
                                        {{ $teacher->specialization }}
                                    </span>
                                </td>

                                <td class="p-4 text-sm text-right pr-6">
                                    <div class="inline-flex items-center gap-2 justify-end">
                                        <x-tables.crud-actions 
                                            :show="route('teachers.show', $teacher)"
                                            :edit="route('teachers.edit', $teacher)" 
                                            :delete="route('teachers.destroy', $teacher)" 
                                            confirmMessage="Are you sure you want to delete this teacher?" />

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="p-16 text-center text-slate-400 dark:text-slate-500">
                                    <div class="flex flex-col items-center justify-center gap-3">
                                        <div
                                            class="p-4 bg-slate-50 dark:bg-slate-800 rounded-full text-slate-300 dark:text-slate-600">
                                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                                </path>
                                            </svg>
                                        </div>
                                        <span class="text-base font-medium text-slate-500">No teachers found</span>
                                        <p class="text-xs text-slate-400 max-w-xs">There are no faculty members registered
                                            in the system yet. Click the button above to register a new teacher.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                    @if($teachers->hasPages())
                    <div class="flex justify-end bg-white dark:bg-slate-900 px-3 py-1.5 border border-slate-200 dark:border-slate-800 rounded-2xl shadow-sm custom-pagination">
                    {{ $teachers->links() }}
                    </div>
                    @endif
            </div>

        </div>
    </div>
</x-app-layout>