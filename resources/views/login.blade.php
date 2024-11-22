<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>
<body>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Form</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-100 flex justify-center items-center h-screen">

        {{-- Login Form --}}
        <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">

            {{-- Display Message --}}
            @if (session('success'))
            <div id="success-alert"  class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-300" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                  <span class="font-medium">{{session('success')}}</span>
                </div>
              </div>
            @endif

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

            @if (session('reset_success'))
            <div id="success-alert"  class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-300" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                  <span class="font-medium">{{session('reset_success')}}</span>
                </div>
              </div>
            @endif

            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Login</h2>

            <form action="{{route('account.authenticate')}}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="text" name="email" placeholder="Enter your email" value="{{old('email')}}"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        @error('email')
                        <p class="text-red-600 text-sm mt-1">{{$message}}</p>
                        @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        @error('password')
                        <p class="text-red-600 text-sm mt-1">{{$message}}</p>
                        @enderror
                </div>
                <div class="mb-3">
                    <div class="g-recaptcha" data-sitekey="6LdJyXMqAAAAABGtS31c6UGwq8W06--QcaP-0mzz" data-callback="enableSubmitBtn"></div>
                @error('g-recaptcha-response')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
                </div>

                <div>
                    <button type="submit" id="submitBtn" disabled
                        class="w-full p-3 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-500 active:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">Login</button>
                </div>

            </form>
            <div class="flex items-center justify-center mb-4 mt-3">
                <div>
                    <a href="{{route('forget.password')}}" class="text-sm text-indigo-500 hover:text-indigo-600">Forgot your password?</a>
                </div>
            </div>


            <div class="mt-4 text-center">
                <p class="text-sm text-gray-600">Don't have an account? <a href="{{route('account.register')}}" class="text-indigo-500 hover:text-indigo-600">Register</a></p>
            </div>
        </div>
    </body>
    </html>

</body>

<script>
    // Hide the alert after 3 seconds (3000 milliseconds)
    setTimeout(function() {
        var alert = document.getElementById('success-alert');
        if (alert) {
            alert.style.display = 'none';
        }
    }, 3000);

    function enableSubmitBtn(){
        document.getElementById("submitBtn").disabled = false;
    }

</script>
</html>
