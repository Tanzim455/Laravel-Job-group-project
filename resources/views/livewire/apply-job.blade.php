<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    @auth
  @include('homenav')  
  @endauth

    @if (session()->has('success'))
    <div class="text-green-500">
        {{ session()->get('success') }}
    </div>
@endif
    <form wire:submit="applyJobs"
    enctype="multipart/form-data"
    >
    <div class="mb-5">
        <label for="asking_salary" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter your asking salary</label>
        <input wire:model="asking_salary" type="number"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" 
        placeholder="20000"  />
        @error('asking_salary')
          <span class="text-red-500">{{ $message }}</span>
         @enderror
      </div>
      <div class="mb-5">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Your Cv here</label>
        <input wire:model="CV" type="file"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" 
        placeholder="Place your CV here"  />
        @error('CV')
          <span class="text-red-500">{{ $message }}</span>
         @enderror
      </div>
      <div class="mb-5">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Your Cv here</label>
        <input wire:model="job_id" type="hidden"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" 
        placeholder="Place your CV here"  />
      </div>
      {{-- @if (auth()->user()?->appliedJobs->contains($job_id))
      auth()->user()?->appliedJobs --}}
      @if (auth()?->user())
      @if (auth()->user()?->appliedJobs->contains('job_id', $job_id))
      You have already applied for this job
  @else
      <button type="submit" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Submit</button>

   
        
  
  @endif
      @endif
      
      @guest
      <a href="{{route('login')}}" target="_blank" class="mt-5 text-red-500">Please log in to apply for this job.</a>   
      @endguest
     
 

      
       {{-- @else --}}
      
      
    </form>
</div>
