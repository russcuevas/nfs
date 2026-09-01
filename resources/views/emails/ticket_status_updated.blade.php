<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>National Food Showdown 2026 - Ticket Status Update</title>
</head>
<body style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; background-color: #ffffff; color: #111827; margin: 0; padding: 20px; line-height: 1.5;">
    <div style="max-width: 560px; margin: 0 auto; font-size: 14px; color: #111827;">
        
        <!-- Header -->
        <div style="border-bottom: 2px solid #111827; padding-bottom: 12px; margin-bottom: 20px;">
            <h2 style="margin: 0; font-size: 18px; font-weight: bold; color: #111827;">National Food Showdown 2026</h2>
            <p style="margin: 2px 0 0 0; font-size: 12px; color: #4b5563;">Ticket Status Update Notification</p>
        </div>

        <p style="margin-top: 0;">Hello <strong>{{ $registration->name }}</strong>,</p>

        <p>The status of your ticket request <strong>{{ $registration->ticket_number }}</strong> has been updated by the Admin team:</p>

        <div style="margin: 16px 0; padding: 12px 16px; border: 1px solid #e5e7eb; border-radius: 6px; font-size: 14px;">
            @if($registration->status === 'approved')
                <div style="color: #15803d; font-weight: bold; font-size: 16px; margin-bottom: 4px;">
                    ✔ APPROVED
                </div>
                <div style="color: #166534;">
                    Congratulations! Your payment has been verified and your ticket for National Food Showdown 2026 is fully confirmed.
                </div>
            @elseif($registration->status === 'rejected')
                <div style="color: #b91c1c; font-weight: bold; font-size: 16px; margin-bottom: 4px;">
                    ✖ REJECTED
                </div>
                <div style="color: #991b1b;">
                    Your registration payment could not be verified. Please double check your reference number or contact support.
                </div>
            @else
                <div style="color: #b45309; font-weight: bold; font-size: 16px; margin-bottom: 4px;">
                    PENDING
                </div>
                <div style="color: #92400e;">
                    Your registration is currently under review by our admin team.
                </div>
            @endif
        </div>

        <h4 style="margin: 20px 0 8px 0; font-size: 13px; font-weight: bold; color: #111827; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 1px solid #e5e7eb; padding-bottom: 4px;">Registration Summary</h4>

        <table width="100%" cellspacing="0" cellpadding="6" style="font-size: 14px; border-collapse: collapse; margin-bottom: 20px;">
            <tr style="border-bottom: 1px solid #f3f4f6;">
                <td style="color: #4b5563; padding-left: 0; width: 40%;">Ticket Number:</td>
                <td style="color: #ea580c; font-family: monospace; font-weight: bold;">{{ $registration->ticket_number }}</td>
            </tr>
            <tr style="border-bottom: 1px solid #f3f4f6;">
                <td style="color: #4b5563; padding-left: 0;">Registration Type:</td>
                <td style="color: #111827; font-weight: bold;">{{ ucfirst($registration->registration_type) }} Pass</td>
            </tr>
            @if($registration->registration_type === 'contestant')
            <tr style="border-bottom: 1px solid #f3f4f6;">
                <td style="color: #4b5563; padding-left: 0;">Availed Competition:</td>
                <td style="color: #111827; font-weight: bold;">{{ $registration->contest_category }}</td>
            </tr>
            @else
            <tr style="border-bottom: 1px solid #f3f4f6;">
                <td style="color: #4b5563; padding-left: 0;">Availed Ticket Pass:</td>
                <td style="color: #111827; font-weight: bold;">{{ $registration->ticket_type_label }}</td>
            </tr>
            @endif
            <tr style="border-bottom: 1px solid #f3f4f6;">
                <td style="color: #4b5563; padding-left: 0;">School / Institution:</td>
                <td style="color: #111827; font-weight: bold;">{{ $registration->school }}</td>
            </tr>
            <tr style="border-bottom: 1px solid #f3f4f6;">
                <td style="color: #4b5563; padding-left: 0;">Amount Paid:</td>
                <td style="color: #16a34a; font-weight: bold;">{{ $registration->formatted_price }}</td>
            </tr>
            <tr>
                <td style="color: #4b5563; padding-left: 0;">GCash Ref Number:</td>
                <td style="color: #111827; font-family: monospace; font-weight: bold;">{{ $registration->reference_number }}</td>
            </tr>
        </table>

        <p style="margin: 20px 0 8px 0;">
            <a href="{{ route('track', ['query' => $registration->ticket_number]) }}" style="color: #ea580c; font-weight: bold; text-decoration: underline;">
                View Full Ticket Status Online &rarr;
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
