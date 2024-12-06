{{-- resources/views/livewire/recent-activity-card.blade.php --}}
<h3 class="text-xl font-semibold mb-4 border-b border-gray-200 pb-2">Recent Activities</h3>
<ul class="space-y-4">
    <li class="flex items-center space-x-4 border-b border-gray-200 pb-3">
        <div class="w-12 h-12 bg-blue-500 text-white flex items-center justify-center rounded-full">
            <i class="fas fa-user-plus text-2xl"></i>
        </div>
        <div wire:init = "recentPatientRegistration"  wire:poll="recentPatientRegistration">
            <p class="text-gray-600 text-sm">New patient registration</p>
            <span  class="text-gray-400 text-xs"  wire:poll>{{ now() }} minutes ago</span>
        </div>
    </li>
    <li class="flex items-center space-x-4 border-b border-gray-200 pb-3">
        <div class="w-12 h-12 bg-green-500 text-white flex items-center justify-center rounded-full">
            <i class="fas fa-donate text-2xl"></i>
        </div>
        <div>
            <p class="text-gray-600 text-sm">Donation received</p>
            <span class="text-gray-400 text-xs">1 hour ago</span>
        </div>
    </li>
    <li class="flex items-center space-x-4 border-b border-gray-200 pb-3">
        <div class="w-12 h-12 bg-yellow-500 text-white flex items-center justify-center rounded-full">
            <i class="fas fa-calendar-check text-2xl"></i>
        </div>
        <div>
            <p class="text-gray-600 text-sm">Appointment scheduled</p>
            <span class="text-gray-400 text-xs">2 hours ago</span>
        </div>
    </li>
    <!-- Add more items as needed -->
</ul>
