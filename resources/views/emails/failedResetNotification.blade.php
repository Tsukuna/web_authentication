<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Failed Password Reset Alert</title>
</head>
<body style="background-color: #f3f4f6; font-family: Arial, sans-serif; margin: 0; padding: 0;">
    <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="margin-top: 20px;">
        <tr>
            <td align="center">
                <table role="presentation" cellpadding="0" cellspacing="0" width="500" style="background-color: #ffffff; border-radius: 8px; box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1); overflow: hidden;">

                    <tr>
                        <td style="text-align: center; padding: 10px 20px;">
                            <h2 style="color: red; font-size: 24px; margin: 0;">Security Alert</h2>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: center; padding: 0 20px;">
                            <p style="color: #4a5568; font-size: 14px; margin: 10px 0;">
                                We noticed multiple failed attempts to reset your password.
                            </p>
                            <p style="color: #4a5568; font-size: 14px; line-height: 1.6;">
                                If you initiated this request, you can use the button below to proceed with resetting your password. If you didn't make this request, please secure your account immediately by updating your password and reviewing your account activity.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 20px;">
                            <a href="{{ route('reset.password', $token) }}" style="background-color: #6366f1; color: #ffffff; text-decoration: none; padding: 10px 20px; border-radius: 6px; font-size: 14px; font-weight: bold;">
                                Reset Password
                            </a>
                        </td>
                    </tr>
                   
                    <tr>
                        <td style="text-align: center; padding: 20px; color: #718096; font-size: 12px;">
                            <p style="margin: 0;">Best regards,</p>
                            <p style="margin: 0;">Security Team</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
