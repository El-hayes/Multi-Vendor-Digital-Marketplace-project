<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $mailSubject }}</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f4f4f4; color: #333;">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; background-color: #ffffff; margin: 20px auto; border: 1px solid #e0e0e0; border-radius: 8px;">
        <!-- Header Section -->
        <tr>
            <td align="center" style="padding: 20px; background-color: #007BFF; color: #ffffff; border-radius: 8px 8px 0 0;">
                <h1 style="margin: 0; font-size: 24px;">{{ __('Welcome to ') }} DIGIMART</h1>
            </td>
        </tr>

        <!-- Main Content Section -->
        <tr>
            <td style="padding: 20px;">
                <h2 style="font-size: 20px; margin-top: 0;">{{ __('Hello') }} , {{ $name }}</h2>
                <p style="font-size: 16px; line-height: 1.5; margin-bottom: 20px;">
                    {!! $content !!}
                </p>

            </td>
        </tr>

        <!-- Footer Section -->
        <tr>
            <td align="center" style="padding: 20px; background-color: #f4f4f4; color: #888; font-size: 14px; border-radius: 0 0 8px 8px;">
                <p style="margin: 0;">Digimart &copy; {{ date('Y') }}. {{ __('All rights reserved.') }}</p>
            </td>
        </tr>
    </table>
</body>
</html>
