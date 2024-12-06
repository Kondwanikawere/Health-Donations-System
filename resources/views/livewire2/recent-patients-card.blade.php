<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration Table</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="flex justify-between bg-white items-center p-4">
        <h4 class="text-xl font-semibold text-gray-700">Patient Registrations</h4>
        <a href="#" class="text-gray-500 hover:underline">View All</a>
    </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">Patient ID</th>
            <th scope="col" class="px-6 py-3">Name</th>
            <th scope="col" class="px-6 py-3">Date of Registration</th>
            <th scope="col" class="px-6 py-3">Health Worker</th>
            <th scope="col" class="px-6 py-3">Status</th>
            <th scope="col" class="px-6 py-3">Action</th>
        </tr>
        </thead>
        <tbody>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                001
            </th>
            <td class="px-6 py-4">John Doe</td>
            <td class="px-6 py-4">2024-08-01</td>
            <td class="px-6 py-4">Dr. Smith</td>
            <td class="px-6 py-4">
                <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">Pending</span>
            </td>
            <td class="px-6 py-4">
                <div class="flex space-x-2">
                    <button class="text-indigo-600 hover:text-indigo-900"><i class="fas fa-check"></i></button>
                    <button class="text-red-600 hover:text-red-900"><i class="fas fa-times"></i></button>
                </div>
            </td>
        </tr>
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                002
            </th>
            <td class="px-6 py-4">Jane Smith</td>
            <td class="px-6 py-4">2024-08-02</td>
            <td class="px-6 py-4">Dr. Brown</td>
            <td class="px-6 py-4">
                <span class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">Rejected</span>
            </td>
            <td class="px-6 py-4">
                <div class="flex space-x-2">
                    <button class="text-indigo-600 hover:text-indigo-900"><i class="fas fa-check"></i></button>
                    <button class="text-red-600 hover:text-red-900"><i class="fas fa-times"></i></button>
                </div>
            </td>
        </tr>
        <!-- Repeat similar rows for other patients -->
        </tbody>
    </table>
</div>
</body>
</html>
