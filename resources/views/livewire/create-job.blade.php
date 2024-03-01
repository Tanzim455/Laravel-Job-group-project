<div>
    @include('livewire.companynav')
    {{-- {{Auth::guard('company')->user() }} --}}
    {{-- 'title','description','min_experience','max_experience' --}}
    <div class="flex flex-col w-1/2 container mx-auto">
        @if (session()->has('success'))
                        <div class="text-green-500">
                            {{ session()->get('success') }}
                        </div>
                    @endif
        <form wire:submit="savejobs" class="p-6 bg-white rounded-lg shadow-md xl:w-full">
          <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" wire:model="title" id="name" class="mt-1 p-2 w-full border rounded-md">
          </div>
          @error('title')
          <span class="text-red-500">{{ $message }}</span>
         @enderror
          <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="message" wire:model="description" rows="4" class="mt-1 p-2 w-full border rounded-md" placeholder="Write your thoughts here..."></textarea>
          </div>
          @error('description')
          <span class="text-red-500">{{ $message }}</span>
         @enderror
          <div class="mb-4">
            <label for="min_salary" class="block text-sm font-medium text-gray-700">Min Salary</label>
            <input type="number" wire:model="min_salary"  class="mt-1 p-2 w-full border rounded-md">
          </div>
          @error('min_salary')
          <span class="text-red-500">{{ $message }}</span>
         @enderror
          <div class="mb-4">
            <label for="min_salary" class="block text-sm font-medium text-gray-700">Max Salary</label>
            <input type="number" wire:model="max_salary"  class="mt-1 p-2 w-full border rounded-md">
          </div>
          @error('max_salary')
          <span class="text-red-500">{{ $message }}</span>
         @enderror
          <div class="mb-4">
            <label for="min_experience" class="block text-sm font-medium text-gray-700">Min Experience</label>
            <input type="number" wire:model="min_experience"  class="mt-1 p-2 w-full border rounded-md">
          </div>
          @error('min_experience')
          <span class="text-red-500">{{ $message }}</span>
         @enderror
          <div class="mb-4">
            <label for="max_experience" class="block text-sm font-medium text-gray-700">Max Experience</label>
            <input type="number" wire:model="max_experience"  class="mt-1 p-2 w-full border rounded-md">
          </div>
          @error('max_experience')
          <span class="text-red-500">{{ $message }}</span>
         @enderror
          <div class="mb-4">
            <label for="address" class="block text-sm font-medium text-gray-700">Qualification</label>
            <input type="text" wire:model="qualification"  class="mt-1 p-2 w-full border rounded-md">
          </div>
          @error('qualification')
          <span class="text-red-500">{{ $message }}</span>
         @enderror
          <div class="mb-4">
            <label for="apply_url" class="block text-sm font-medium text-gray-700">Apply Url(if applied through link)</label>
            <input type="text" wire:model="apply_url"  class="mt-1 p-2 w-full border rounded-md">
          </div>
          <div class="mb-4">
            <label for="job_location" class="block text-sm font-medium text-gray-700">Address</label>
            <input type="text" wire:model="job_location"  class="mt-1 p-2 w-full border rounded-md">
          </div>
          @error('job_location')
          <span class="text-red-500">{{ $message }}</span>
         @enderror
          <div class="mb-4">
            <label for="expiration_date" class="block text-sm font-medium text-gray-700">Expiration Date</label>
            <input type="date" wire:model="expiration_date"  class="mt-1 p-2 w-full border rounded-md">
          </div>
          @error('expiration_date')
          <span class="text-red-500">{{ $message }}</span>
         @enderror
      
          
        
          
      
          
      
          
      
          
          Location type
        
          <div class="mb-4">
            <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
            <select id="country" wire:model="category_id" class="mt-1 p-2 w">
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option> 
                @endforeach

              
            </select>
            @error('category_id')
          <span class="text-red-500">{{ $message }}</span>
         @enderror
              </div> 
              <div class="mb-4">
                <label for="country" class="block text-sm font-medium text-gray-700">Tags</label>
                <select wire:model="tags[]"  class="mt-1 p-2 w-48"multiple>
                    @foreach ($allTags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option> 
                    @endforeach
    
                  
                </select>
                  </div>
                  <div class="mb-4">
                    <label for="country" class="block text-sm font-medium text-gray-700">Location Type</label>
                    <select wire:model="job_location_type"   class="mt-1 p-2 w-48">
                        @foreach ($job_location_type as $job)
                        <option value="{{$job}}">{{$job}}</option> 
                        @endforeach
        
                      
                    </select>
                      </div>
                  
         <button  class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Submit</button>   
        </form> 
        Form ends here 
</div>
</div>