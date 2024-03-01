<div>
    @foreach ($jobs as $job)
    {{$job->id}}
        {{$job->title}}
        {{$job->min_experience}}
        {{$job->max_experience}}
        {{$job->min_salary}}
        {{$job->max_salary}}
        {{$job->qualification}}
        {{$job->job_location}}
        {{$job->job_location_type}}
    @endforeach
</div>

