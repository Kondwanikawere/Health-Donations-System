@extends('layouts.app2')

@section('content')

   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

   </head>


   @if(@session('status'))
       <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
           {{ session('status') }}
       </div>
   @endif
   
         <div class="grid grid-cols-3 gap-4 mb-4">
            <div class="flex items-center justify-between w-full md:w-1/3 p-4 bg-white shadow rounded-lg sm:h-2/4 h-24">
               @livewire('total-patients-card', ['patientsTotal'=>$patientsTotal])
            </div>


            <!-- Total Workers Card -->
            <div class="flex items-center justify-between w-full md:w-1/3 p-4 bg-white shadow rounded-lg">
               @livewire('total-workers-card')
            </div>

            <!-- Total Funds Card -->
            <div class="flex items-center justify-between w-full md:w-1/3 p-4 bg-white shadow rounded-lg">
               @livewire('donation-progress-card',  ['donationsTotal'=>$donationsTotal])
            </div>
         </div>
         <div class="flex mb-4 space-x-4">
            <!-- Card 1: Takes 2/3 of the width -->
            <div class="flex-1 bg-white shadow-lg rounded-lg p-4 w-4">
               <h2 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Recent Patients</h2>
               @livewire('recent-patients-card', ['recentPatients'=> $recentPatients])
            </div>
            <div class="flex-2 bg-white shadow-lg rounded-lg p-4">
               @livewire('recent-activity-card')
            </div>
            <!-- Card 2: Takes 1/3 of the width -->
         </div>


         <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="flex items-center justify-center rounded shadow bg-white h-40 dark:bg-gray-800">
               @livewire('top-donors-chart', ['donors'=> $donors])
            </div>
            <div class="flex items-center justify-center rounded shadow bg-white  dark:bg-gray-800">
               @livewire('map',  ['donors'=> $donors])
            </div>

         </div>




@endsection
