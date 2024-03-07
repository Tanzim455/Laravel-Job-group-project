<div>
  
  @include('homenav')  
  

   Hello

  <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
  placeholder="Search by Location"
  wire:model.live.debounce.500ms="search_location" >
  @error('search_location')
  <span class="text-red-500">{{ $message }}</span>
 @enderror
 <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
  placeholder="Search by Salary"
  wire:model.live.debounce.750ms="search_salary" >
  @error('search_salary')
  <span class="text-red-500">{{ $message }}</span>
 @enderror
  @foreach ($jobs as $job)
      <div class="m-5">
          <div class="group mx-2 mt-10 grid max-w-screen-md grid-cols-12 space-x-8 overflow-hidden rounded-lg border py-6 text-gray-700 shadow transition hover:shadow-lg sm:mx-auto space-y-1">
              <div class="col-span-11 flex flex-col pr-8 text-left sm:pl-4">
                  <h3 class="text-sm text-gray-600"></h3>
                  <a href="{{route('job.details',$job->id)}}" class="mb-3 overflow-hidden pr-7 text-lg font-semibold sm:text-xl" target="_blank" wire:navigate>{{ $job->title }}</a>
                  <div class="flex flex-col space-y-3 text-sm font-medium text-gray-500 sm:flex-row sm:items-center sm:space-y-0 sm:space-x-2 space-x-2">
                      <div class="">Experience:<span class="ml-2 mr-3 rounded-full bg-green-100 px-2 py-0.5 text-green-900">{{ $job->min_experience }}-{{ $job->max_experience }} Years</span></div>
                      <div class="">Salary:<span class="ml-2 mr-3 rounded-full bg-blue-100 px-2 py-0.5 text-blue-900">{{ $job->min_salary }}-{{ $job->max_salary }} BDT</span></div>
                      <div class="pl-2">Qualification<span class="ml-2 mr-3 rounded-full bg-blue-100 px-2 py-0.5 text-blue-900">{{ $job->qualification }}</span></div>
                  </div>
                  <div class="mt-5 flex flex-col space-y-3 text-sm font-medium text-gray-500 sm:flex-row sm:items-center sm:space-y-0 sm:space-x-2 space-x-2">
                      <div class="pl-2">Address<span class="ml-2 mr-3 rounded-full bg-blue-100 px-2 py-0.5 text-blue-900">{{ $job->job_location }}</span></div>
                      <div class="pl-2">Job Location Type<span class="ml-2 mr-3 rounded-full bg-blue-100 px-2 py-0.5 text-blue-900">{{ $job->job_location_type }}</span></div>
                      <div class="pl-2">Expiration date<span class="ml-2 mr-3 rounded-full bg-blue-100 px-2 py-0.5 text-blue-900">{{ $job->expiration_date }}</span></div>
                  </div>
                  <div class="mt-5 flex   space-y-3 text-sm font-medium text-gray-500 sm:flex-row sm:items-center sm:space-y-0 sm:space-x-2 space-x-2">
                    <div class="pl-2">Company<span class="ml-2 mr-3 rounded-full bg-blue-100 px-2 py-0.5 text-blue-900">{{ $job->company->name }}</span></div>
                    <div class="pl-2">Category<span class="ml-2 mr-3 rounded-full bg-blue-100 px-2 py-0.5 text-blue-900">{{ $job->category->name }}</span></div>
                    Tags
                    @foreach ($job->tags as $tag)
                    <div class="pl-2"><span class="mr-3 rounded-full bg-blue-100 px-2 py-0.5 text-blue-900 cursor-pointer">#{{ $tag->name }}</span></div>
                    @endforeach
                  </div>
                 
                    
                  @if (auth()->user())
                  @if (auth()->user()?->appliedJobs->contains('job_id', $job->id))
                  You have already applied for this job
                 
                      
                  
                      
                  @elseif($job->apply_url)
                      
                  <div class="mt-5">
                    
                   
                        <a class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900" href="{{$job->apply_url}}" target="_blank">Url of link to be applied</a>
                   
                </div>
                      
                  
              
                  
              @else
                  
              
              <a 
                  href="{{ route('job.apply',$job->id)}}"
                  target="_blank"
                  class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900 w-32 mt-1 text-center" wire:navigate>Apply</a>
                  @endif
                  @endif
                  
                
                     @guest
                     <a href="{{route('login')}}" target="_blank" class="mt-5 text-red-500">Please log in to apply for this job.</a>   
                     @endguest
                      
                  
              </div>
          </div>
      </div>
  @endforeach
  
</div>

