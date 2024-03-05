<div>
    @include('livewire.companynav')
    <div class="flex flex-col justify-center w-1/2">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Serial Number</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Asking Salary</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Applicant Name</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">CV</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($appliedJobs as $job)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $job->asking_salary }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $job->user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap"><a target="_blank" href="{{ asset('storage/'.$job->CV) }}" class="text-blue-500 hover:underline">CV</a></td>
                    </tr>
                @empty
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-500" colspan="3">No applicants for this job</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
</div>
