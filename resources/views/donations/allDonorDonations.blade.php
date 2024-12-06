@extends('layouts.app2')

@section('content')

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="text-center">
            @if(@session('status'))
                <div class="flex items-center p-4 mb-4 text-lg text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <h1 class="pb-2">All DONORS'S  DONATIONS</h1>
        </div>

        
        

        <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex flex-col items-center pb-10">
                <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ URL('/images/images/picc.jpeg') }}" alt="flower"/>
                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">
                    @if(isset($donations[0]))
                        {{ $donations[0]->name }}  
                    @endif
                </h5>
            </div>

            <table id="export-table">
            <thead>
            <tr>
                <th>
                <span class="flex items-center">
                    Donation ID
                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                    </svg>
                </span>
                </th>

                <th>
                <span class="flex items-center">
                    Amount donated
                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                    </svg>
                </span>
                </th>

                <th>
                <span class="flex items-center">
                    Mode of transaction
                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                    </svg>
                </span>
                </th>


                <th>
                <span class="flex items-center">
                    patients_Id
                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                    </svg>
                </span>
                </th>

                <th>
                <span class="flex items-center">
                    Date of tranctions
                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                    </svg>
                </span>
                </th>

            </tr>
            </thead>
            <tbody>
            @foreach($donations as $donation)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="mt-2">
                        {{ $donation->id }}
                    </div>
                </td>
                <td>
                    <div class="mt-2">
                        {{ $donation->amount_donated }}
                    </div>
                </td>
                <td>
                    <div class="mt-2">
                        {{ $donation->mode }}
                    </div>
                </td>
                <td>
                    <div class="mt-2">
                        {{ $donation->patients_Id }}
                    </div> 
                </td>
                <td>
                    <div class="mt-2">
                        {{ $donation->created_at }}
                    </div> 
                </td>
               
            </tr>
            @endforeach
            </tbody>
        </table>

        </div>

    </div>

@endsection
