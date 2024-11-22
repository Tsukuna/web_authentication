<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        @if (session('error'))
        <div id="success-alert"  class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-300" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div>
              <span class="font-medium">{{session('error')}}</span>
            </div>
          </div>
        @endif
        <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">Login with OTP</h2>

        <form action="{{route('login.otp.post')}}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="otp" class="block text-sm font-medium text-gray-600 mb-1">One-Time Password (OTP)</label>
                <input
                    type="text"
                    id="otp"
                    name="otp"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="Enter your OTP"
                >
                @error('otp')
                <p class="text-red-600 text-sm mt-1">{{$message}}</p>
                @enderror

            </div>



            <button
                type="submit"
                class="w-full py-2 px-4 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors duration-200 font-semibold"
            >
                Login
            </button>
        </form>

        <!-- Resend OTP Link -->
        <div class="text-center mt-6">
            <a href="{{route('login.otp')}}" class="text-sm text-indigo-600 hover:underline">Resend OTP</a>
        </div>
    </div>
</body>
<script>
    // Hide the alert after 3 seconds (3000 milliseconds)
    setTimeout(function() {
        var alert = document.getElementById('success-alert');
        if (alert) {
            alert.style.display = 'none';
        }
    }, 3000);
</script>
</html>
