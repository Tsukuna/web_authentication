<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            text-align: center;
        }
        .email-header {
            padding: 15px;
            border-bottom: 1px solid #e0e0e0;
        }
        .email-body {
            padding: 20px;
            color: #333333;
        }
        .email-footer {
            padding: 15px;
            font-size: 0.85em;
            color: #666666;
            border-top: 1px solid #e0e0e0;
        }
        .reset-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #000000; /* Black button */
            color: #ffffff; /* White text */
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .reset-button:hover {
            background-color: #333333; /* Darker black on hover */
        }

        .reset-word{
            color: white
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h2>Password Reset</h2>
        </div>
        <div class="email-body">
            <p>Hello, {{ $name }}</p> <!-- User’s name here -->
            <p>We received a request to reset your password. Click the button below to proceed.</p>
            <a href="{{ route('reset.password', $token) }}" class="reset-button"><span class="reset-word">Reset Password</span></a>
            <p>If you didn’t request a password reset, you can safely ignore this email.</p>
        </div>
        <div class="email-footer">
            <p>Thank you,<br>Your Company Name</p>
        </div>
    </div>
</body>
</html>
