<x-layout>
    <x-breadcrumbs class="mb-4"
        :links="['Jobs' => route('jobs.index'), $job->title => '#']" /> {{-- pass an array (key=>value) to the $attributes parameter in the breadcrumbs component --}}

    <x-job-card :$job > {{-- to show the selected job card info --}}
        <p class="mb-4 text-sm text-slate-500">
            {!! nl2br(e($job->description)) !!}
        </p>
    </x-job-card>
</x-layout>