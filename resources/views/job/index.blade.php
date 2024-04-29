<x-layout>
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