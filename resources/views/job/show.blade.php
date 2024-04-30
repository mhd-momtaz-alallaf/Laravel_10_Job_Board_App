<x-layout>
    <x-breadcrumbs class="mb-4"
        :links="['Jobs' => route('jobs.index'), $job->title => '#']" /> {{-- pass an array (key=>value) to the $attributes parameter in the breadcrumbs component --}}

    <x-job-card :$job /> {{-- to show the selected job card info --}}
</x-layout>