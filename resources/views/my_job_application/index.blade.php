<x-layout>
    <x-breadcrumbs class="mb-4"
        :links="['My Job Applications' => '#']" />
  
    @forelse ($applications as $application)
        <x-job-card :job="$application->job"></x-job-card>
    @empty
        You dont have any applications yet!
    @endforelse
</x-layout>