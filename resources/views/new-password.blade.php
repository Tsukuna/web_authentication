<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg">
        @if (session('error'))
            <div id="success-alert"  class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-300" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                  <span class="font-medium">{{session('error')}}</span>
                </div>
              </div>
            @endif
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-4">Reset Your Password</h2>
        <p class="text-sm text-gray-600 text-center mb-6">Enter your new password below to reset your account password.</p>

        <form action="{{ route('reset.password.post') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" value="{{$email}}"
                       class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 border-gray-300">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                <input  type="password" id="password" name="password" value="{{old('password')}}"
                       class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 border-gray-300" oninput="checkPasswordStrength(this.value)">
                <small id="password-strength-message" class="block mt-1"></small>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                       class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 border-gray-300">
                @error('password_confirmation')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit"
                        class="w-full px-4 py-2 font-semibold text-white bg-indigo-600 rounded-lg hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Reset Password
                </button>
            </div>
        </form>
    </div>
</body>
<script>
    function checkPasswordStrength(password) {
        let strengthMessage = document.getElementById('password-strength-message');
        let score = 0;

        // Check for uppercase letters
        if (/[A-Z]/.test(password)) score++;
        // Check for lowercase letters
        if (/[a-z]/.test(password)) score++;
        // Check for numbers
        if (/[0-9]/.test(password)) score++;
        // Check for special characters
        if (/[_!@#$%^&*()?]/.test(password)) score++;
        // Extra point for long passwords
        if (password.length >= 12) score++;

        // Determine the strength of the password based on the score
        let message = '';
        if (score < 2) {
            message = 'The password is very weak.';
            strengthMessage.style.color = 'red';
        } else if (score < 3) {
            message = 'The password is weak.';
            strengthMessage.style.color = 'orange';
        } else if (score < 4) {
            message = 'The password is strong.';
            strengthMessage.style.color = 'green';
        } else if (score >= 4) {
            message = 'The password is very strong.';
            strengthMessage.style.color = '#006400';
        }

        // Display the message
        strengthMessage.innerText = message;
    }
</script>
</html>
