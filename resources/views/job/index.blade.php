<x-layout>
    <x-breadcrumbs class="mb-4"
        :links="['Jobs' => route('jobs.index')]" />
    
    <x-card class="mb-4 text-sm">
        <form action="{{ route('jobs.index') }}" method="GET"> {{-- using GET method with the form will add the query parameters to the route --}}
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 font-semibold">Search</div>
                    <x-text-input name="search" value="{{request('search')}}" placeholder="Search for any text" /> {{-- we used name="search" not :name="search" while passing the parameters because we want laravel to conseder it as string not as an php statement --}}
                </div>
                <div>
                    <div class="mb-1 font-semibold">Salary</div>
                    <div class="flex space-x-2">
                        <x-text-input name="min_salary" value="{{request('min_salary')}}" placeholder="From" />
                        <x-text-input name="max_salary" value="{{request('max_salary')}}" placeholder="To" />
                    </div>
                </div>
                <div>
                    <div class="mb-1 font-semibold">Experience</div>
          
                    <x-radio-group filterName="experience"
                        :options="array_combine( // craetes an assosiateve array (this will show the experiance levels in first letter upperCase )
                            array_map('ucfirst', \App\Models\Job::$experience), // to be the the key of the new array(the $label inside radio-group.blade.php) ( will upperCase the first letter for each Job::$experience satatic array item )
                            \App\Models\Job::$experience, // and the new array value (options without changes).
                        )" />
                </div>
                <div>
                    <div class="mb-1 font-semibold">Category</div>

                    <x-radio-group filterName="category"
                        :options="\App\Models\Job::$category" />
                </div>

                <button class="w-full">Filter</button>
            </div>
        </form>
  </x-card>

    @foreach ($jobs as $job)
        <x-job-card class="mb-4" :$job> {{-- passing the slot parameter (:$job) in the (job-card) blade component --}}
            <div>
                <x-link-button :href="route('jobs.show', $job)"> {{-- :href is the passed parameter from th componente (link-button), we dont have to put a {{}} for route('jobs.show', $job) because <x-link-button > it not html tag --}}
                    Show {{-- the second $slot parameter in the blade component --}}
                </x-link-button>
            </div>
        </x-job-card>
    @endforeach
</x-layout>