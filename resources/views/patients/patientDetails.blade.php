@extends('layouts.app2')

@section('content')

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="text-center">
            @if(@session('status'))
                <div class="flex items-center p-4 mb-4 text-lg text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <h1 class="pb-2">PATIENT DETAILS</h1>
        </div>

        
        

        <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex flex-col items-center pb-10">
                <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ URL('/images/images/picc.jpeg') }}" alt="flower"/>
            </div>

    
            <div class="max-w-64 mx-auto">
                <div class="grid md:grid-cols-2 mid:gap-6 ml-2">
                    <div class="relative z-0 w-full mb-5 group">
                        <p for="floating_first_name" class=" absolute text-base ">Id:  {{ $patient->id}}</p>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <p for="floating_first_name" class=" absolute text-base ">First name:  {{ $patient->firstName }}</p>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 mid:gap-6 ml-2">
                    <div class="relative z-0 w-full mb-5 group">
                        <p for="floating_first_name" class=" absolute text-base ">Surname:  {{ $patient->surname }}</p>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <p for="floating_last_name" class=" absolute text-base ">Disease: {{ $patient->disease }}</p>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 mid:gap-6 ml-2">
                    <div class="relative z-0 w-full mb-5 group">
                        <p for="floating_first_name" class=" absolute text-base ">Amount: {{ $patient->amount }}</p>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <p for="floating_last_name" class=" absolute text-base ">Updated_at: {{ $patient->updated_at }}</p>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 mid:gap-6 ml-2">
                    <div class="relative z-0 w-full mb-5 group">
                        <p for="floating_repeat_password" class=" absolute text-base ">Created_at: {{ $patient->created_at }}</p>
                    </div>

                    @if($donation)
                        <div class="relative z-0 w-full mb-5 group">
                            <p for="floating_last_name" class=" absolute text-base ">Amount_remaining: {{ $donation->amount_remaining }}</p>
                        </div>
                <div class="grid md:grid-cols-2 mid:gap-6 ml-2">
                        <div class="relative z-0 w-full mb-5 group">
                            <p for="floating_last_name" class=" absolute text-base ">Mode: {{ $donation->mode }}</p>
                </div>
                    </div>
                    @else

                    <div class="relative z-0 w-full mb-5 group">
                        <p for="floating_last_name" class=" absolute text-base ">Amount_remaining: {{ $patient->amount }}</p>
                    </div>
                    @endif

                </div>
            </div>

        </div>

    </div>

@endsection
