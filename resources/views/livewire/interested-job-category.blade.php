<div>
    @include('homenav') 
    @if (session()->has('success'))
                        <div class="text-green-500">
                            {{ session()->get('success') }}
                        </div>
                    @endif 
    <form wire:submit="saveInterestedCategory" class="max-w-sm mx-auto">
        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
          Choose a category you are interested.You will be notified as soon as a job is posted in that category
        </label>
        <select wire:model="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <option selected>Choose a Category</option>
          @foreach ($categories as $category)
          <option value="{{$category->id}}">{{$category->name}}</option>  
          @endforeach
          
          
        </select>
        <button type="submit" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 mt-2">Submit</button>
      </form>
      
</div>
