<x-app-layout>
    <x-slot name="header">
        <div class="py-2">
            <h2 class="font-bold text-2xl text-slate-800 dark:text-slate-100 leading-tight">
                {{ __('Edit Classroom Details') }}
            </h2>
            <p class="text-sm text-slate-500 dark:text-slate-400 mt-1">
                Update the metadata and maximum seating arrangement for this specific classroom.
            </p>
        </div>
    </x-slot>

    <div class="py-8 max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        
            <div class="mb-4">
                <a href="{{ route('classrooms.index') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 hover:text-slate-800 dark:text-slate-400 dark:hover:text-slate-200 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    <span>Back to Classrooms</span>
                </a>
            </div>

        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl shadow-sm p-6 sm:p-8">
            
            <form action="{{ route('classrooms.update', $classroom) }}" method="POST">
                @method('PUT')
                
                @include('classrooms._form')

                <div class="mt-8 pt-6 border-t border-slate-100 dark:border-slate-800 flex items-center justify-end gap-3">
                    <a href="{{ route('classrooms.index') }}" 
                       class="px-4 py-2.5 text-sm font-semibold text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800/60 rounded-xl transition-all">
                        Cancel
                    </a>
                    <button type="submit" 
                           class="bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold px-5 py-2.5 rounded-xl shadow-sm hover:shadow transition-all duration-200">
                        Update Changes
                    </button>
                </div>

            </form>

        </div>
    </div>
</x-app-layout>