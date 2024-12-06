@extends('layouts.app2')

@section('content')

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="text-center">
            @if(@session('status'))
                <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <h1 class="pb-2">PATIENT DONATIONS</h1>
        </div>

        <table id="export-table">
            <thead>
            <tr>
                <th>
                <span class="flex items-center">
                    First Name
                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                    </svg>
                </span>
                </th>

                <th>
                <span class="flex items-center">
                    Surname
                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                    </svg>
                </span>
                </th>

                <th>
                <span class="flex items-center">
                    Amount needed
                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                    </svg>
                </span>
                </th>


                <th>
                <span class="flex items-center">
                    Amount remaining
                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                    </svg>
                </span>
                </th>

                <th>
                <span class="flex items-center sr-only">
                    <svg class="sr-only w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                    </svg>
                </span>
                </th>

                <th>
                <span class="flex items-center sr-only">
                    <svg class="sr-only w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                    </svg>
                </span>
                </th>

            </tr>
            </thead>
            <tbody>
            @foreach($patientsIds as $patientsId)
            @if(isset($records[$patientsId][0]))
            @if($records[$patientsId][0]->firstName)
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
                        {{$records[$patientsId][0]->amount }}
                    </div>
                </td>
                <td>
                    <div class="mt-2">
                        {{$records[$patientsId][0]->amount_remaining }}
                    </div> 
                </td>
               
                <td>
                    <div class="mt-2">
                        <a href="{{ route('viewDonations', $records[$patientsId][0]->patients_Id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            Show All Donations
                        </a>
                    </div>
                </td>
                <td>
                    <form action="{{ route('deletePatientDonation', $records[$patientsId][0]->patients_Id) }}" method="POST" class="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="ml-1 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">
                            Delete
                        </button>
                    </form>
                </td>
               
            </tr>
            @endif
            @endif
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
