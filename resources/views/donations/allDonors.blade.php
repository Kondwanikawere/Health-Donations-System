@extends('layouts.app2')

@section('content')

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="text-center">
            @if(@session('status'))
                <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <h1 class="pb-2">All Donors</h1>
        </div>

        <table id="export-table">
            <thead>
            <tr>
                <th>
                <span class="flex items-center">
                     Name
                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                    </svg>
                </span>
                </th>

                <th>
                <span class="flex items-center">
                    Total Amount Donated
                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4"/>
                    </svg>
                </span>
                </th>

                <th>
                <span class="flex items-center">
                    Created_at
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

            </tr>
            </thead>
            <tbody>
            @foreach($donors as $donor)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <div class="mt-2">
                        {{ $donor->name }}
                    </div>
                </td>
                <td>
                    <div class="mt-2">
                        {{ $donor->amount_donated }}
                    </div>
                </td>
                <td>
                    <div class="mt-2">
                        {{$donor->created_at }}
                    </div>
                </td>
               
                <td>
                    <div class="mt-2">
                        <a href="{{ route('allDonorDonations', $donor->donor_id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            Show All Donations
                        </a>
                    </div>
                </td>
               
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
