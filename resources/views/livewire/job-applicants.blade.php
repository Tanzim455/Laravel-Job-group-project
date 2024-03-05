<div>
    @forelse ($appliedJobs as $job)
       {{$job->asking_salary}}
       {{$job->user->name}}
    @empty
        No applicants for this job
    @endforelse
</div>
