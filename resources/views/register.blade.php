<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">
    {{-- Register Form --}}
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Create an Account</h2>
        <form action="{{route('account.processRegister')}}" method="POST">
            @csrf
                 <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" value="{{old('name')}}"
                        class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        @error('name')
                        <p class="text-red-600 text-sm mt-1">{{$message}}</p>
                        @enderror
                </div>


            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="text" id="email" name="email" placeholder="Enter your email" value="{{old('email')}}"
                    class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error('email')
                    <p class="text-red-600 text-sm mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" value="{{old('password')}}"
                    class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" oninput="checkPasswordStrength(this.value)">
                    <small id="password-strength-message" class="block mt-1"></small>
                    @error('password')
                    <p class="text-red-600 text-sm mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" id="confirm_password" name="password_confirmation" value="{{old('password_confirmation')}}" placeholder="Confirm your password"
                    class="w-full p-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error('password_confirmation')
                    <p class="text-red-600 text-sm mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="">
                <div class="g-recaptcha" data-sitekey="6LdJyXMqAAAAABGtS31c6UGwq8W06--QcaP-0mzz" data-callback="enableSubmitBtn"></div>
            @error('g-recaptcha-response')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
            </div>

            <div>
                <button type="submit" id="submitBtn" disabled
                    class="w-full mt-3 p-3 bg-indigo-600 text-white font-medium rounded-lg hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Sign Up</button>
            </div>

            <div class="mt-4 text-center">
                <p class="text-sm text-gray-600">Already have an account? <a href="{{route('account.login')}}" class="text-indigo-600 hover:text-indigo-500">Log in here</a></p>
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

    function enableSubmitBtn(){
        document.getElementById("submitBtn").disabled = false;
    }


</script>
</html>

