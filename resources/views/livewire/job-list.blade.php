<div>
    @include('livewire.companynav')
    
 
    @if (session()->has('success'))
    <div class="text-green-500">
        {{ session()->get('success') }}
    </div>
@endif
    @foreach ($jobs as $job)
   
    <div class="m-5">
        <div class="group mx-2 mt-10 grid max-w-screen-md grid-cols-12 space-x-8 overflow-hidden rounded-lg border py-8 text-gray-700 shadow transition hover:shadow-lg sm:mx-auto">
          
          <div class="col-span-11 flex flex-col pr-8 text-left sm:pl-4">
            <h3 class="text-sm text-gray-600"></h3>
            <a href="#" class="mb-3 overflow-hidden pr-7 text-lg font-semibold sm:text-xl">{{$job->title}}</a>
            
      
            <div class="mt-5 flex flex-col space-y-3 text-sm font-medium text-gray-500 sm:flex-row sm:items-center sm:space-y-0 sm:space-x-2 space-x-2">
              <div class="">Experience:<span class="ml-2 mr-3 rounded-full bg-green-100 px-2 py-0.5 text-green-900">{{$job->min_experience}}-{{$job->max_experience}} Years</span></div>
              <div class="">Salary:<span class="ml-2 mr-3 rounded-full bg-blue-100 px-2 py-0.5 text-blue-900">{{$job->min_salary}}-{{$job->max_salary}}</span>BDT</div>
              <div class="pl-2">Qualification<span class="ml-2 mr-3 rounded-full bg-blue-100 px-2 py-0.5 text-blue-900">{{$job->qualification}}</div>
              
            </div>
            <div class="mt-5 flex flex-col space-y-3 text-sm font-medium text-gray-500 sm:flex-row sm:items-center sm:space-y-0 sm:space-x-2 space-x-2">
                
     <div class="pl-2">Address<span class="ml-2 mr-3 rounded-full bg-blue-100 px-2 py-0.5 text-blue-900">{{$job->job_location}}</div>
        <div class="pl-2">Job Location Type<span class="ml-2 mr-3 rounded-full bg-blue-100 px-2 py-0.5 text-blue-900">{{$job->job_location_type}}</div> 
            <div class="pl-2">Expiration date<span class="ml-2 mr-3 rounded-full bg-blue-100 px-2 py-0.5 text-blue-900">{{$job->expiration_date}}</div>                     
    
    </div> 
    <div class="mt-5 flex flex-col space-y-3 text-sm font-medium text-gray-500 sm:flex-row sm:items-center sm:space-y-0 sm:space-x-2 space-x-2">
                
        <div class="pl-2">Category<span class="ml-2 mr-3 rounded-full bg-blue-100 px-2 py-0.5 text-blue-900">{{$job->category->name}}</div>
          Tags
            @foreach ($job->tags as $tag)
          <div class="pl-2"><span class="ml-2 mr-3 rounded-full bg-blue-100 px-2 py-0.5 text-blue-900">#{{$tag->name}}</div>
          @endforeach
       </div> 
            <div class="mt-5">
                
                
                @if ($job->id===$idsOfJobsActive[0] || $job->id===$idsOfJobsActive[1] || 
                $job->id===$idsOfJobsActive[2]
                )
                    Active
                @else
                    Inactive
                @endif
                <button wire:click="delete({{$job->id}})" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
            </div>
            <div class="mt-5">
                @if ($job->apply_url)
               
                    <a class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900" href="{{$job->apply_url}}" target="_blank">Url of link to be applied</a>
                @endif
            </div>
            <div class="mt-5">
              
              <a 
              href="{{route('job.applicants',$job->id)}}"
               target="_blank"
                  class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900 w-32 mt-1 text-center" wire:navigate
               
              >Applied Jobs Count-{{$job->applied_jobs_count}}</a>
          </div>
          </div>
        </div>
      </div>
      
      @endforeach
</div>

