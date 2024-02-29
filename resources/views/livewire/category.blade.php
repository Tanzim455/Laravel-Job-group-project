<div>
    <div class="flex flex-col items-center justify-center">
    <form wire:submit="savecategory" class="max-w-sm mx-auto">
        <div class="mb-5">
            @if (session()->has('success'))
                        <div class="text-green-500">
                            {{ session()->get('success') }}
                        </div>
                    @endif
          <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
          <input wire:model="name"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" />
          @error('name')
          <span class="text-red-500">{{ $message }}</span>
      @enderror
        </div>
        
        
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
      </form>
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        edit
                    </th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                
                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                    
                    <td class="px-6 py-4">
                        {{$category->id}}
                    </td>
                    <td class="px-6 py-4">
                        {{$category->name}}
                    </td>
                    
                    <td class="px-6 py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                </tr> 
                @endforeach
                
                
                
            </tbody>
        </table>
    </div>
    
    </div>
    
</div>
