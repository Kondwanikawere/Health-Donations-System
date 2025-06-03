@extends('layouts.app2')

@section('content')

   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
            <div class="flex items-center justify-between w-full md:w-1/3 p-4 bg-white shadow rounded-lg sm:!h-36 ">
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
         <div class="flex mb-4 md:space-x-4 flex-col md:!flex-row">
            <!-- Card 1: Takes 2/3 of the width -->
            <div class=" bg-white shadow-lg rounded-lg p-4 w-[100%] md:!w-[70%] order-2 md:!order-1">
               <div class="grid">
                  <h2 class="text-lg font-medium text-gray-900 dark:text-white mb-4 justify-self-center">Recent Patients</h2>
               </div>
               @livewire('recent-patients-card', ['recentPatients'=> $recentPatients])
            </div>
            <div class=" bg-white shadow-lg rounded-lg p-4 w-[100%] md:!w-[30%] order-1 md:!order-2 mb-3 md:!mb-0">
               @livewire('recent-activity-card')
            </div>
            <!-- Card 2: Takes 1/3 of the width -->
         </div>


         <div class="grid md:!grid-cols-2 md:!gap-4 mb-4 md:!grid-flow-col vs:!grid-flow-row vs:!grid-cols-1 vs:gap-y-3">
            <div class="flex items-center justify-center rounded shadow bg-white  dark:bg-gray-800">
               @livewire('top-donors-chart', ['donors'=> $donors])
            </div>
            <div class="flex items-center justify-center rounded shadow bg-white  dark:bg-gray-800">
               @livewire('map',  ['donors'=> $donors])
            </div>

         </div>




@endsection
