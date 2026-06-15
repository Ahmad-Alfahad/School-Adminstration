@csrf

<div class="space-y-6">
    <div>
        <label for="name" class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
            Classroom Name
        </label>
        <input type="text" 
               name="name" 
               id="name" 
               value="{{ old('name', $classroom->name ?? '') }}" 
               placeholder="e.g. Grade 10 - Section A"
               class="w-full rounded-xl border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-950 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 dark:focus:border-emerald-500 transition-all duration-200 @error('name') border-rose-500 dark:border-rose-500 focus:ring-rose-500/20 focus:border-rose-500 @enderror"
               required>
        @error('name')
            <p class="mt-2 text-sm text-rose-600 dark:text-rose-400 font-medium">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="capacity" class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
            Classroom Capacity (Seats)
        </label>
        <input type="number" 
               name="capacity" 
               id="capacity" 
               value="{{ old('capacity', $classroom->capacity ?? '') }}" 
               placeholder="e.g. 25"
               min="1"
               class="w-full rounded-xl border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-950 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 dark:focus:border-emerald-500 transition-all duration-200 @error('capacity') border-rose-500 dark:border-rose-500 focus:ring-rose-500/20 focus:border-rose-500 @enderror"
               required>
        @error('capacity')
            <p class="mt-2 text-sm text-rose-600 dark:text-rose-400 font-medium">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="capacity" class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-2">
            Classroom Description
        </label>
        <input type="text" 
               name="description" 
               id="description" 
               value="{{ old('description', $classroom->description ?? '') }}" 
               placeholder="description"
               class="w-full rounded-xl border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-950 text-slate-900 dark:text-slate-100 placeholder-slate-400 focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 dark:focus:border-emerald-500 transition-all duration-200 @error('capacity') border-rose-500 dark:border-rose-500 focus:ring-rose-500/20 focus:border-rose-500 @enderror"
               required>
        @error('description')
            <p class="mt-2 text-sm text-rose-600 dark:text-rose-400 font-medium">{{ $message }}</p>
        @enderror
    </div>
</div>