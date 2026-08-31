<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>National Food Showdown 2026 - Ticket Status Update</title>
</head>
<body style="font-family: Arial, Helvetica, sans-serif; background-color: #f4f6f8; color: #111827; margin: 0; padding: 20px;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px; overflow: hidden;">
        <!-- Header -->
        <tr>
            <td style="background-color: #ff6b00; padding: 24px; text-align: center; color: #ffffff;">
                <h1 style="margin: 0; font-size: 22px; font-weight: bold; text-transform: uppercase;">National Food Showdown 2026</h1>
                <p style="margin: 4px 0 0 0; font-size: 13px; opacity: 0.9;">Ticket Status Notification</p>
            </td>
        </tr>

        <!-- Content -->
        <tr>
            <td style="padding: 24px; font-size: 14px; line-height: 1.6; color: #333333;">
                <p style="margin-top: 0;">Hello <strong>{{ $registration->name }}</strong>,</p>

                <p>The status of your ticket request <strong>#{{ $registration->ticket_number }}</strong> has been updated by the Admin team:</p>

                <div style="text-align: center; margin: 24px 0; padding: 20px; background-color: #f8fafc; border-radius: 8px; border: 1px solid #e2e8f0;">
                    @if($registration->status === 'approved')
                        <div style="display: inline-block; background-color: #dcfce7; color: #15803d; border: 1px solid #86efac; padding: 8px 24px; border-radius: 20px; font-weight: bold; font-size: 18px; text-transform: uppercase; margin-bottom: 12px;">
                            ✔ APPROVED
                        </div>
                        <p style="margin: 0; font-size: 14px; color: #166534; font-weight: bold;">
                            Congratulations! Your payment has been verified and your ticket for National Food Showdown 2026 is fully confirmed!
                        </p>
                    @elseif($registration->status === 'rejected')
                        <div style="display: inline-block; background-color: #fee2e2; color: #b91c1c; border: 1px solid #fca5a5; padding: 8px 24px; border-radius: 20px; font-weight: bold; font-size: 18px; text-transform: uppercase; margin-bottom: 12px;">
                            ✖ REJECTED
                        </div>
                        <p style="margin: 0; font-size: 14px; color: #991b1b; font-weight: bold;">
                            Your registration payment could not be verified. Please double check your reference number or contact support.
                        </p>
                    @else
                        <div style="display: inline-block; background-color: #fef3c7; color: #b45309; border: 1px solid #fde047; padding: 8px 24px; border-radius: 20px; font-weight: bold; font-size: 18px; text-transform: uppercase; margin-bottom: 12px;">
                            PENDING
                        </div>
                        <p style="margin: 0; font-size: 14px; color: #92400e;">
                            Your registration is currently under review by our admin team.
                        </p>
                    @endif
                </div>

                <div style="text-align: center; margin-top: 24px;">
                    <a href="{{ route('track', ['query' => $registration->ticket_number]) }}" style="display: inline-block; background-color: #0284c7; color: #ffffff; text-decoration: none; padding: 12px 28px; border-radius: 6px; font-weight: bold; font-size: 14px;">
                        View Full Ticket Details Online &rarr;
                    </a>
                </div>
            </td>
        </tr>

        <!-- Footer -->
        <tr>
            <td style="background-color: #f8fafc; padding: 16px; text-align: center; font-size: 12px; color: #64748b; border-top: 1px solid #e2e8f0;">
                &copy; 2026 National Food Showdown. University of Batangas Lipa City.
            </td>
        </tr>
    </table>
</body>
</html>
