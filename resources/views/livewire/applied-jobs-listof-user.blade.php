<div>
    @include('homenav')
    <div class="flex flex-col justify-center w-1/2">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Serial Number</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Job</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Application Date</th>
                    
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($appliedJobs as $job)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap font-serif">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowra font-serif">
                        <a href="{{route('job.details',$job->job->id)}}" target="_blank" class="text-blue-600">{{ $job->job->title}}</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap font-serif">{{ $job->created_at->format('Y-m-d') }}</td>
                        
                      
                @empty
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-500" colspan="3">You dont have any job aplications</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
