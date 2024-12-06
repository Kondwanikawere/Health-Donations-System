<div class="bg-white shadow-md py-4 px-6 flex rounded-lg mb-4 items-center">
    <!-- Search Field Container -->
    <div class="flex-grow flex justify-center">
        <input type="text" placeholder="Search..." class="border border-gray-300 rounded-full py-2 px-4 w-full max-w-md" />
    </div>
    
    <!-- User Info -->
    <div class="ml-4 flex items-center space-x-4">
        <!-- Avatar -->
        <div class="w-10 h-10 bg-gray-200 rounded-full flex items-center justify-center overflow-hidden">
            <img src="{{ asset('path/to/avatar.jpg') }}" alt="User Avatar" class="w-full h-full object-cover" />
        </div>
        
        <!-- User Name -->
        <span class="text-gray-800 font-semibold">John Doe</span>
    </div>
</div>
