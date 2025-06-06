


<div class="w-[100%]">
    <table class="w-[100%] p-4 text-left text-gray-500 mt-6 dark:text-gray-400">
        <thead class="w-[100%] text-[12px] text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 xs:!text-[12px] vs:!text-[8px]">
            <tr>
                <th scope="col" class="py-3">Patient ID</th>
                <th scope="col" class="py-3">Name</th>
                <th scope="col" class="py-3">Date of Registration</th>
                <th scope="col" class="py-3">Health Worker</th>
                <th scope="col" class="py-3">Status</th>
                <th scope="col" class="py-3">Action</th>
            </tr>
        </thead>
        <tbody class="w-[100%]">
            @foreach($recentPatients as $recentPatient)
            <tr class="w-[100%] bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-[12px] xs:!text-[12px] vs:!text-[8px]">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 lg:whitespace-nowrap dark:text-white">
                    {{ $recentPatient->id }}
                </th>
                <td class=" py-4">{{ $recentPatient->firstName}} {{$recentPatient->surname }}</td>
                <td class=" py-4">{{ $recentPatient->created_at }}</td>
                <td class=" py-4">Dr. Smith</td>
                <td class=" py-4">
                    <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                        @if($recentPatient->isAccepted == 0)
                            Denied
                        @elseif($recentPatient->isAccepted == 1)
                            Accepted
                        @else($recentPatient->isAccepted == 3)
                            Pending
                        @endif
                    </span>
                </td>
                <td class=" py-4">
                    <button class="text-indigo-600 hover:text-indigo-900"><i class="fas fa-check"></i></button>
                    <button class="text-red-600 hover:text-red-900 ml-4"><i class="fas fa-times"></i></button>
                </td>
            </tr>
            @endforeach
        
           
            <!-- Repeat similar rows for other patients -->
        </tbody>
    </table>
</div>
