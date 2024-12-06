<div class="bg-white p-4 rounded-lg shadow-lg">
    <h3 class="text-xl font-semibold mb-4 border-b border-gray-200 pb-2">Recent Activities</h3>
    <ul class="space-y-4">
        <li class="flex items-center space-x-4 border-b border-gray-200 pb-3">
            <div class="w-12 h-12 bg-blue-500 text-white flex items-center justify-center rounded-full">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 4V2H4v12h2V6h6v8h2V4z" />
                </svg>
            </div>
            <div>
                <p class="text-gray-600 text-sm">New patient registration</p>
                <span class="text-gray-400 text-xs">{{ $diff_in_hours }} minutes ago</span>
            </div>
        </li>
        <li class="flex items-center space-x-4 border-b border-gray-200 pb-3">
            <div class="w-12 h-12 bg-green-500 text-white flex items-center justify-center rounded-full">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 4v8.59L15.59 15 17 13.59 13.41 10H20v-2H12z" />
                </svg>
            </div>
            <div>
                <p class="text-gray-600 text-sm">Donation received</p>
                <span class="text-gray-400 text-xs">1 hour ago</span>
            </div>
        </li>
        <li class="flex items-center space-x-4 border-b border-gray-200 pb-3">
            <div class="w-12 h-12 bg-yellow-500 text-white flex items-center justify-center rounded-full">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M3 4h18v2H3zm0 4h18v2H3zm0 4h18v2H3zm0 4h18v2H3z" />
                </svg>
            </div>
            <div>
                <p class="text-gray-600 text-sm">Appointment scheduled</p>
                <span class="text-gray-400 text-xs">2 hours ago</span>
            </div>
        </li>
        <!-- Add more items as needed -->
    </ul>
</div>
