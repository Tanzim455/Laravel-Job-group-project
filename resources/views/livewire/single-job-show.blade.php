<div>
    @include('homenav') 
    <div class="container bg-white shadow-md rounded-md p-4 w-2/3 sm:w-2/3 mx-auto">
        <div class="flex justify-between">
          <h2 class="text-lg font-semibold text-gray-600">Job Title - {{$job->title}}</h2>
          <p class="text-gray-600 font-semibold">Company Name</p>
        </div>
        <div class="flex justify-between">
          <p class="font-semibold text-gray-800 text-md">Job Location - {{$job->job_location}}</p>
          <p class="text-md font-semibold text-gray-800">Job Location Type-{{$job->job_location_type}}</p>
        </div>
        <div class="flex justify-between">
            <p class="font-semibold text-gray-800 text-md">Salary From {{$job->min_salary}}-To {{$job->max_salary}}</p>
            <p class="font-semibold text-gray-800 text-md">Experience From {{$job->min_experience}}-To {{$job->max_experience}}</p>
          </div>
          <div>
            
          </div>
          
          <div class="flex justify-between">
            @auth
                @if (auth()->user()->appliedJobs->contains('job_id', $job->id))
                    You have already applied for this job.
                    @if ($job->apply_url)
                    <div>The apply Url exists</div>
                        <div class="mt-5">
                            <a class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900"
                               href="{{ $job->apply_url }}" target="_blank">Apply here</a>
                        </div>
                    @else
                        <a href="{{ route('job.apply', $job->id) }}" target="_blank"
                           class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900 w-32 mt-1 text-center"
                           wire:navigate>Apply</a>
                    @endif
                @endif
            @endauth
        
            @guest
    @if ($companyJobIds->contains($job->id) && !$job->apply_url)
        <a href="{{ route('job.apply', $job->id) }}" target="_blank" class="mt-5 text-red-500">Apply here</a>
    @elseif(!$companyJobIds->contains($job->id) && $job->apply_url)
    <div class="mt-5">
      <a class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900"
         href="{{ $job->apply_url }}" target="_blank">Apply here</a>
  </div>
        @elseif($companyJobIds->contains($job->id) && $job->apply_url)
        <div class="mt-5">
          <a class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900"
             href="{{ $job->apply_url }}" target="_blank">Apply here</a>
      </div>
      @else
      <div>This job is yet not active yet</div>
    @endif
@endguest

        
        </div>
        

          <div>
          <div class="font-semibold text-gray-600 font-serif text-md">
            {{$job->description}}    
        </div>  
          </div>
      </div>
      
      
</div>
