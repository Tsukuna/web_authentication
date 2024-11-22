<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])

</head>
<body class="bg-gray-100 h-screen flex">

    <!-- Sidebar -->
    <div class="w-64 bg-indigo-800 text-white flex flex-col">
        <div class="py-4 px-6 text-2xl font-semibold">Admin Dashboard</div>
        <nav class="flex-1 px-4">
            <ul>
                <li class="mb-4">
                    <a href="#" class="block py-2 px-4 rounded hover:bg-indigo-700">Dashboard</a>
                </li>
                <li class="mb-4">
                    <a href="#" class="block py-2 px-4 rounded hover:bg-indigo-700">Users</a>
                </li>
                <li class="mb-4">
                    <a href="#" class="block py-2 px-4 rounded hover:bg-indigo-700">Analytics</a>
                </li>
                <li class="mb-4">
                    <a href="#" class="block py-2 px-4 rounded hover:bg-indigo-700">Settings</a>
                </li>
            </ul>
        </nav>

    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Top Nav -->
        <header class="flex justify-between items-center bg-white shadow p-4">
            <h2 class="text-xl font-semibold text-gray-800">Welcome, <span>{{Auth::user()->name}}</span></h2>
            <div>
                <a href="{{route('account.logout')}}" class="px-4 py-2.5 bg-indigo-600 text-white rounded-lg hover:bg-indigo-500">Logout</a>
            </div>
        </header>

        <!-- Dashboard Content -->
        <main class="flex-1 p-6 bg-gray-100">
            <!-- Charts/Graphs Section -->
            <div class="mt-8">
                <h3 class="text-2xl font-semibold text-gray-800">Recent Activity</h3>
                <div class="mt-4 bg-white p-6 rounded-lg shadow">
                    <!-- Placeholder for charts/graphs -->
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        User Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Password
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Created_at
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Updated_at
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                {{-- {{$users}} --}}
                              @foreach ($users as $user)
                              <tr class="odd:bg-white odd:dark:bg-gray-600 even:bg-gray-50 even:dark:bg-gray-600 border-b dark:border-gray-700">
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$loop->iteration}}
                                </td>
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$user->name}}
                                </td>
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$user->email}}
                                </td>
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$user->password}}
                                </td>
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$user->created_at}}
                                </td>
                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$user->updated_at}}
                                </td>
                            </tr>
                              @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </main>
    </div>

</body>
</html>
