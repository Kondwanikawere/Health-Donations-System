
    <div class="flex items-center xs:!flex-row vs:!flex-col">
        <!-- Circle Progress -->
        <div class="relative flex items-center justify-center vs:!w-12 vs:!h-12 sm:!w-24 sm:!h-24 bg-gray-200 rounded-full">
            <div class="absolute inset-0 flex items-center justify-center">
                <svg width="60px" height="60px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#35af2c" width="24" height="24" stroke="#35af2c">

                    <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                    <g id="SVGRepo_iconCarrier"> <defs> <style>.cls-1{fill:none;stroke:#35af2c;stroke-miterlimit:10;stroke-width:2px;}</style> </defs> <g id="analysis"> <polyline class="cls-1" points="3.96 14.04 9 9 15 15 23 7"/> <line class="cls-1" x1="2.54" y1="15.46" x2="1" y2="17"/> </g> </g>

                </svg>
            </div>
        </div>
        <!-- Progress Detail -->
        <div class="ml-4">
            <p class="mb-2 text-gray-600 vs:!text-[12px] sm:!text-[16px]">Donation Progress</p>
            <h4 class="text-xl font-bold text-gray-900">{{ $donationsTotal }}</h4>
        </div>
    </div>

