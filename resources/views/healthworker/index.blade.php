@extends('layouts.app2')

@section('content')
    <div class="container mx-auto py-8">
        @if (session('success'))
            <div id="successMessage" class="bg-green-500 text-white p-4 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif
        <h1 class="text-3xl font-semibold mb-6 text-center">Health Workers</h1>

        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table id="adminTable" class="min-w-full bg-white border-collapse table-auto">
                <thead>
                <tr class="w-full bg-gray-100 border-b">
                    <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                    <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Verified</th>
                    <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Admin Approved</th>
                    <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                    <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                @foreach($admins as $admin)
                    <tr>
                        <td class="py-4 px-6 whitespace-nowrap text-sm font-medium text-gray-900">{{ $admin->id }}</td>
                        <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-500">{{ $admin->name }}</td>
                        <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-500">{{ $admin->email }}</td>
                        <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-500">{{ ucfirst($admin->role) }}</td>
                        <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-500">{{ $admin->isVerified ? 'Yes' : 'No' }}</td>
                        <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-500">{{ $admin->isApprovedAdmin ? 'Yes' : 'No' }}</td>
                        <td class="py-4 px-6 whitespace-nowrap text-sm text-gray-500">{{ $admin->created_at->format('Y-m-d') }}</td>
                        <td class="py-4 px-6 whitespace-nowrap text-sm font-medium">
                            <form action="{{ route('admin.approve', $admin->id) }}" method="POST" class="inline-block">
                                @csrf
                                <button type="submit" class="text-green-600 hover:text-green-900 flex items-center" onclick="return confirm('Are you sure you want to approve this admin?')">
                                    <i class="fas fa-check-circle mr-2"></i>
                                </button>
                            </form>
                            <form action="{{ route('admin.delete', $admin->id) }}" method="POST" class="inline-block ml-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 flex items-center" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash-alt mr-2"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            // Show success message if it exists
            const successMessage = document.getElementById('successMessage');
            if (successMessage) {
                // Hide the message after 5 seconds
                setTimeout(function() {
                    successMessage.style.opacity = 0;
                    setTimeout(function() {
                        successMessage.style.display = 'none';
                    }, 500); // Wait for fade out transition
                }, 5000); // 5 seconds
            }

            const dataTable = new simpleDatatables.DataTable("#adminTable", {
                searchable: true,
                fixedHeight: false,
                perPage: 10,
                columns: [
                    { select: 0, sortable: true }, // ID
                    { select: 1, sortable: true }, // Name
                    { select: 2, sortable: true }, // Email
                    { select: 3, sortable: false }, // Role
                    { select: 4, sortable: true }, // Verified
                    { select: 5, sortable: true }, // Admin Approved
                    { select: 6, sortable: true }, // Created At
                    { select: 7, sortable: false }  // Actions
                ],
                labels: {
                    placeholder: "Search Admins...",
                    perPage: "{select} entries per page",
                    noRows: "No admins found",
                    info: "Showing {start} to {end} of {rows} admins"
                },
                layout: {
                    top: "{search}",
                    bottom: "{pager}"
                }
            });

            // Toggle column visibility
            document.querySelectorAll(".toggle-column").forEach(function(toggle) {
                toggle.addEventListener("change", function() {
                    const columnIndex = toggle.getAttribute("data-column-index");
                    dataTable.columns().visible(columnIndex, toggle.checked);
                });
            });
        });
    </script>
@endpush
