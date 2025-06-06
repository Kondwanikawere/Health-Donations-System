
    <div class="flex items-center xs:!flex-row vs:!flex-col">
        <!-- Circle Progress -->
        <div class="relative flex items-center justify-center vs:!w-12 vs:!h-12 sm:!w-24 sm:!h-24 bg-gray-200 rounded-full ">
            <div class="absolute inset-0 flex items-center justify-center">
               <svg class="w-12 h-12 text-primary" width="50" height="50" viewBox="0 0 24 24">
                    <path d="M14 19.2857L15.8 21L20 17M16.5 14.4018C16.2052 14.2315 15.8784 14.1098 15.5303 14.0472C15.4548 14.0337 15.3748 14.024 15.2842 14.0171C15.059 14 14.9464 13.9915 14.7961 14.0027C14.6399 14.0143 14.5527 14.0297 14.4019 14.0723C14.2569 14.1132 13.9957 14.2315 13.4732 14.4682C12.7191 14.8098 11.8817 15 11 15C10.1183 15 9.28093 14.8098 8.52682 14.4682C8.00429 14.2315 7.74302 14.1131 7.59797 14.0722C7.4472 14.0297 7.35983 14.0143 7.20361 14.0026C7.05331 13.9914 6.94079 14 6.71575 14.0172C6.6237 14.0242 6.5425 14.0341 6.46558 14.048C5.23442 14.2709 4.27087 15.2344 4.04798 16.4656C4 16.7306 4 17.0485 4 17.6841V19.4C4 19.9601 4 20.2401 4.10899 20.454C4.20487 20.6422 4.35785 20.7951 4.54601 20.891C4.75992 21 5.03995 21 5.6 21H10.5M15 7C15 9.20914 13.2091 11 11 11C8.79086 11 7 9.20914 7 7C7 4.79086 8.79086 3 11 3C13.2091 3 15 4.79086 15 7Z" stroke="#007bff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
        </div>
        <!-- Progress Detail -->
        <div class="ml-4 ">
            <p class="mb-2 text-gray-600 vs:!text-[12px] sm:!text-[16px]">Total Patients</p>
            <h4 class="text-xl font-bold text-gray-900">{{ $patientsTotal }}</h4>
        </div>
    </div>
