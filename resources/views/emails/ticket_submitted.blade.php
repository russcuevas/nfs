<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>National Food Showdown 2026 - Registration Received</title>
</head>
<body style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; background-color: #ffffff; color: #111827; margin: 0; padding: 20px; line-height: 1.5;">
    <div style="max-width: 560px; margin: 0 auto; font-size: 14px; color: #111827;">
        
        <!-- Header -->
        <div style="border-bottom: 2px solid #111827; padding-bottom: 12px; margin-bottom: 20px;">
            <h2 style="margin: 0; font-size: 18px; font-weight: bold; color: #111827;">National Food Showdown 2026</h2>
            <p style="margin: 2px 0 0 0; font-size: 12px; color: #4b5563;">Event Registration Confirmation</p>
        </div>

        <p style="margin-top: 0;">Hello <strong>{{ $registration->name }}</strong>,</p>

        <p>Thank you for registering for the <strong>National Food Showdown 2026</strong>. We have received your payment details and your registration request is currently pending verification.</p>

        <p style="margin: 16px 0;"><strong>Ticket Code:</strong> <span style="font-family: monospace; font-size: 16px; color: #ea580c; font-weight: bold;">{{ $registration->ticket_number }}</span></p>

        <!-- Registration Summary -->
        <h4 style="margin: 20px 0 8px 0; font-size: 13px; font-weight: bold; color: #111827; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 1px solid #e5e7eb; padding-bottom: 4px;">Registration & Item Availed</h4>

        <table width="100%" cellspacing="0" cellpadding="6" style="font-size: 14px; border-collapse: collapse; margin-bottom: 20px;">
            <tr style="border-bottom: 1px solid #f3f4f6;">
                <td style="color: #4b5563; padding-left: 0; width: 40%;">Registration Type:</td>
                <td style="color: #111827; font-weight: bold;">{{ ucfirst($registration->registration_type) }} Pass</td>
            </tr>
            @if($registration->registration_type === 'contestant')
            <tr style="border-bottom: 1px solid #f3f4f6;">
                <td style="color: #4b5563; padding-left: 0;">Availed Competition:</td>
                <td style="color: #ea580c; font-weight: bold;">{{ $registration->contest_category }}</td>
            </tr>
            @else
            <tr style="border-bottom: 1px solid #f3f4f6;">
                <td style="color: #4b5563; padding-left: 0;">Availed Ticket Pass:</td>
                <td style="color: #0284c7; font-weight: bold;">{{ $registration->ticket_type_label }}</td>
            </tr>
            @if($registration->contact_number)
            <tr style="border-bottom: 1px solid #f3f4f6;">
                <td style="color: #4b5563; padding-left: 0;">Contact Number:</td>
                <td style="color: #111827; font-weight: bold;">{{ $registration->contact_number }}</td>
            </tr>
            @endif
            @endif
            <tr style="border-bottom: 1px solid #f3f4f6;">
                <td style="color: #4b5563; padding-left: 0;">School / Institution:</td>
                <td style="color: #111827; font-weight: bold;">{{ $registration->school }} {{ $registration->is_ublc ? '(UB Lipa City)' : '(Outside UB)' }}</td>
            </tr>
            <tr style="border-bottom: 1px solid #f3f4f6;">
                <td style="color: #4b5563; padding-left: 0;">Amount Paid:</td>
                <td style="color: #16a34a; font-weight: bold;">{{ $registration->formatted_price }}</td>
            </tr>
            <tr style="border-bottom: 1px solid #f3f4f6;">
                <td style="color: #4b5563; padding-left: 0;">GCash Ref Number:</td>
                <td style="color: #111827; font-family: monospace; font-weight: bold;">{{ $registration->reference_number }}</td>
            </tr>
            <tr>
                <td style="color: #4b5563; padding-left: 0;">Status:</td>
                <td style="color: #d97706; font-weight: bold;">Pending Admin Verification</td>
            </tr>
        </table>

        <p style="margin: 20px 0 8px 0; font-size: 13px; color: #374151;">
            Please wait for the admin team to verify your payment. You can check the status of your ticket anytime by clicking below:
        </p>

        <p style="margin: 8px 0 24px 0;">
            <a href="{{ route('track', ['query' => $registration->ticket_number]) }}" style="color: #ea580c; font-weight: bold; text-decoration: underline;">
                Track My Ticket Status ({{ $registration->ticket_number }}) &rarr;
            </a>
        </p>

        <div style="margin-top: 30px; padding-top: 16px; border-top: 1px solid #e5e7eb; font-size: 12px; color: #6b7280;">
            Regards,<br>
            <strong>National Food Showdown 2026 Team</strong><br>
            University of Batangas Lipa City
        </div>

    </div>
</body>
</html>
