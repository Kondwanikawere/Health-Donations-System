@extends('layouts.app2')

@section('content')

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="text-center">
           @if(@session('status'))
                <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <h1 class="pb-2">Reports</h1>
        </div>

        <table id="export-table">
            <thead>
            <tr>
                <th>
                <span class="flex items-center">
                    Total no. of patients
                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                    </svg>
                </span>
                </th>

                <th>
                <span class="flex items-center">
                    no. of accepted patients
                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                    </svg>
                </span>
                </th>

                <th>
                <span class="flex items-center">
                    no. of denied patients
                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                    </svg>
                </span>
                </th>

                <th>
                <span class="flex items-center">
                    no. of patients on pending
                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                    </svg>
                </span>
                </th>

                <th>
                <span class="flex items-center">
                    % accepted
                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                    </svg>
                </span>
                </th>

                <th>
                <span class="flex items-center">
                    % denied
                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                    </svg>
                </span>
                </th>

            </tr>
            </thead>
            <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="mt-2">
                       {{ $patientsTotal }}
                    </div>
                </td>
                <td>
                    <div class="mt-2">
                       {{ $acceptedPatientsTotal }}
                    </div>
                </td>
                <td>
                    <div class="mt-2">
                        {{ $deniedPatientsTotal }}
                    </div>
                </td>
                <td>
                    <div class="mt-2">
                        {{ $pendingPatientsTotal }}
                    </div> 
                </td>
                <td>
                    <div class="mt-2">
                        {{ $percentaccepted }}%
                    </div> 
                </td>
                <td>
                    <div class="mt-2">
                        {{ $percentdenied }}%
                    </div>
                    
                </td>
               
            </tr>
           
            </tbody>
        </table>

        
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-9">
        <div class="text-center">
            <h1 class="pb-2">Patients frequently receiving help</h1>
        </div>
        <table id="export-table2">
                <thead>
                <tr>
                    <th>
                    <span class="flex items-center">
                        Firstname
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg>
                    </span>
                    </th>

                    <th>
                    <span class="flex items-center">
                        surname
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg>
                    </span>
                    </th>

                    <th>
                    <span class="flex items-center">
                        amount remaining
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg>
                    </span>
                    </th>

                </tr>
                </thead>
                <tbody>
                @foreach($patientsIds as $patientsId)
                @if($recordscount[$patientsId] > 2 && $records[$patientsId][0]->amount_remaining != 0)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="mt-2">
                            {{ $records[$patientsId][0]->firstName }}
                        </div>
                    </td>
                    <td>
                        <div class="mt-2">
                            {{ $records[$patientsId][0]->surname }}
                        </div>
                    </td>
                    <td>
                        <div class="mt-2">
                            {{$records[$patientsId][0]->amount_remaining }}
                        </div>
                    </td>
                
                </tr>
                @endif
                @endforeach
                </tbody>
            </table>

    </div>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-9">
        <div class="text-center">
            <h1 class="pb-2">Patients on emergency</h1>
        </div>
        <table id="export-table3">
                <thead>
                <tr>
                    <th>
                    <span class="flex items-center">
                        Firstname
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg>
                    </span>
                    </th>

                    <th>
                    <span class="flex items-center">
                        surname
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg>
                    </span>
                    </th>

                    <th>
                    <span class="flex items-center">
                        amount remaining
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg>
                    </span>
                    </th>
                    <th>
                    <span class="flex items-center">
                        days remaining
                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                        </svg>
                    </span>
                    </th>

                </tr>
                </thead>
                <tbody>
                @foreach($patientsIds as $patientsId)
                @if(isset($records[$patientsId][0]) && isset($daysremaining[$patientsId]))
                @if($daysremaining[$patientsId] < 61 && $records[$patientsId][0]->amount_remaining != 0)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <div class="mt-2">
                            {{ $records[$patientsId][0]->firstName }}
                        </div>
                    </td>
                    <td>
                        <div class="mt-2">
                            {{ $records[$patientsId][0]->surname }}
                        </div>
                    </td>
                    <td>
                        <div class="mt-2">
                            {{$records[$patientsId][0]->amount_remaining }}
                        </div>
                    </td>
                    <td>
                        <div class="mt-2">
                            {{$daysremaining[$patientsId] }}
                        </div>
                    </td>
                
                </tr>
                @endif
                @endif
                @endforeach
                </tbody>
            </table>

    </div>

@endsection
