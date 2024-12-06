@extends('layouts.app2')

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Register a patient</h2>

            @if(@session('status'))
                <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('patientStore') }}" method = "Post">
                @csrf

                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Firstname</label>
                        <input type="text" name="firstName" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type Firstname" required="">

                        @error('firstName')
                             <span style="color: #DC4C64">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Surname</label>
                        <input type="text" name="surname" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type Surname" required="">
                        @error('surname')
                            <span style="color: #DC4C64">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="w-full">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Disease/Condition</label>
                        <input type="text" name="disease" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="e.g lung disease" required="">
                        @error('disease')
                            <span style="color: #DC4C64">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Amount Needed</label>
                        <input type="text" name="amount" id="item-weight" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="K20,000,000" required="">
                        @error('amount')
                            <span style="color: #DC4C64">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <button type="submit" class="text-white mt-2.5 bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Register
                </button>
            </form>
        </div>
    </section>
@endsection
