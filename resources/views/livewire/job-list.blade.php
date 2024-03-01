<div>
    @include('livewire.companynav')
    
    {{-- {{$job->id}}
        {{$job->title}}
        {{$job->min_experience}}
        {{$job->max_experience}}
        {{$job->min_salary}}
        {{$job->max_salary}}
        {{$job->qualification}}
        {{$job->job_location}}
        {{$job->job_location_type}}
    @endforeach --}}
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


          </div>
        </div>
      </div>
      @endforeach
</div>

