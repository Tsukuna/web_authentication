<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    <nav class="bg-indigo-600 p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-semibold text-white">Welcome, {{ auth()->user()->name }}!</h1>
            <a href="{{route('account.logout')}}" class="text-white hover:underline">Logout</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-indigo-700 text-white py-20">
        <div class="container mx-auto text-center">
            <h2 class="text-4xl font-bold mb-4">{{ auth()->user()->name }}'s Dashboard</h2>
            <p class="text-lg mb-8">Quickly access all your activities, manage your profile, and stay updated.</p>
            <a href="#quick-actions" class="px-6 py-3 bg-indigo-500 hover:bg-indigo-400 text-white rounded-lg shadow-md transition duration-200">
                Explore Quick Actions
            </a>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-12 flex flex-col items-center">
        <!-- Quick Actions Section -->
        <section id="quick-actions" class="mb-12 w-full max-w-4xl">
            <h3 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Quick Actions</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Update Profile -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <h4 class="text-lg font-bold text-indigo-600">Update Profile</h4>
                    <p class="text-gray-600 mt-2">Edit your personal information and contact details.</p>
                    <div id="update-profile" class="mb-8 mt-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Update Profile</h3>
                        <form action="" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                                <input type="text" id="username" name="username" placeholder="Enter new username" value="{{ auth()->user()->name }}"
                                    class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            </div>
                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" id="email" name="email" placeholder="Enter new email" value="{{ auth()->user()->email }}"
                                    class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            </div>
                            <button type="submit"
                                class="p-3 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">Update
                                Profile</button>
                        </form>
                    </div>
                </div>

                <!-- View Recent Activity -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <h4 class="text-lg font-bold text-indigo-600">View Recent Activity</h4>
                    <p class="text-gray-600 mt-2">Review your recent activities and updates.</p>
                    <div id="recent-activity" class="mt-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Recent Activity</h3>
                        <ul class="space-y-4">
                            <!-- Example Activity Logs -->
                            <li class="flex items-start">
                                <span class="inline-block bg-indigo-600 text-white rounded-full p-2 mr-3">1</span>
                                <div class="text-gray-700">Logged in on {{ auth()->user()->created_at->format('M d, Y H:i') }}</div>
                            </li>
                            <li class="flex items-start">
                                <span class="inline-block bg-indigo-600 text-white rounded-full p-2 mr-3">2</span>
                                <div class="text-gray-700">Updated Password on {{ auth()->user()->updated_at->format('M d, Y H:i') }}</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>


    <!-- Footer -->
    <footer class="bg-indigo-700 text-white py-4 mt-12">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
