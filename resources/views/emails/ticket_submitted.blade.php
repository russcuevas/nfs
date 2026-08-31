<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>National Food Showdown 2026 - Registration Received</title>
</head>
<body style="font-family: Arial, Helvetica, sans-serif; background-color: #f4f6f8; color: #111827; margin: 0; padding: 20px;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border: 1px solid #e2e8f0; border-radius: 8px; overflow: hidden;">
        <!-- Header -->
        <tr>
            <td style="background-color: #ff6b00; padding: 24px; text-align: center; color: #ffffff;">
                <h1 style="margin: 0; font-size: 22px; font-weight: bold; text-transform: uppercase;">National Food Showdown 2026</h1>
                <p style="margin: 4px 0 0 0; font-size: 13px; opacity: 0.9;">DALUYAB: Celebrating Excellence</p>
            </td>
        </tr>

        <!-- Content -->
        <tr>
            <td style="padding: 24px; font-size: 14px; line-height: 1.6; color: #333333;">
                <p style="margin-top: 0;">Hello <strong>{{ $registration->name }}</strong>,</p>

                <p>Thank you for registering for the <strong>National Food Showdown 2026</strong>! We have successfully received your payment details and registration request.</p>

                <div style="background-color: #fff7ed; border-left: 4px solid #ff6b00; padding: 14px; margin: 20px 0; border-radius: 4px;">
                    <p style="margin: 0; font-size: 14px; color: #9a3412;">
                        <strong>Important:</strong> Please wait for the admin team to verify your payment. You can track your ticket status anytime here: 
                        <a href="{{ route('track', ['query' => $registration->ticket_number]) }}" style="color: #ea580c; font-weight: bold; text-decoration: underline;">Track My Ticket Status</a>
                    </p>
                </div>

                <div style="text-align: center; margin: 24px 0; padding: 16px; background-color: #f8fafc; border: 1px dashed #cbd5e1; border-radius: 8px;">
                    <div style="font-size: 12px; color: #64748b; font-weight: bold; text-transform: uppercase; margin-bottom: 4px;">Your Ticket Number</div>
                    <div style="font-size: 22px; font-weight: bold; color: #ea580c; letter-spacing: 1px;">{{ $registration->ticket_number }}</div>
                </div>

                <h3 style="margin-top: 24px; margin-bottom: 12px; font-size: 16px; color: #111827; border-bottom: 2px solid #ff6b00; padding-bottom: 6px;">Registration Details</h3>

                <table width="100%" cellspacing="0" cellpadding="8" style="font-size: 14px; border-collapse: collapse; margin-bottom: 20px;">
                    <tr style="border-bottom: 1px solid #e2e8f0;">
                        <td style="color: #64748b; font-weight: bold; width: 40%;">Registration Type:</td>
                        <td style="color: #111827; font-weight: bold; text-align: right;">{{ ucfirst($registration->registration_type) }}</td>
                    </tr>
                    @if($registration->registration_type === 'contestant')
                    <tr style="border-bottom: 1px solid #e2e8f0;">
                        <td style="color: #64748b; font-weight: bold;">Contest Category:</td>
                        <td style="color: #111827; font-weight: bold; text-align: right;">{{ $registration->contest_category }}</td>
                    </tr>
                    @endif
                    <tr style="border-bottom: 1px solid #e2e8f0;">
                        <td style="color: #64748b; font-weight: bold;">School / Institution:</td>
                        <td style="color: #111827; font-weight: bold; text-align: right;">{{ $registration->school }} {{ $registration->is_ublc ? '(UB Lipa City)' : '(Outside UB)' }}</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e2e8f0;">
                        <td style="color: #64748b; font-weight: bold;">Ticket Pass Option:</td>
                        <td style="color: #111827; font-weight: bold; text-align: right;">{{ $registration->ticket_type_label }}</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e2e8f0;">
                        <td style="color: #64748b; font-weight: bold;">Total Amount Paid:</td>
                        <td style="color: #16a34a; font-weight: bold; font-size: 16px; text-align: right;">{{ $registration->formatted_price }}</td>
                    </tr>
                    <tr style="border-bottom: 1px solid #e2e8f0;">
                        <td style="color: #64748b; font-weight: bold;">GCash Ref Number:</td>
                        <td style="color: #111827; font-family: monospace; font-weight: bold; text-align: right;">{{ $registration->reference_number }}</td>
                    </tr>
                    <tr>
                        <td style="color: #64748b; font-weight: bold;">Current Status:</td>
                        <td style="color: #d97706; font-weight: bold; text-transform: uppercase; text-align: right;">PENDING VERIFICATION</td>
                    </tr>
                </table>

                <div style="text-align: center; margin-top: 24px;">
                    <a href="{{ route('track', ['query' => $registration->ticket_number]) }}" style="display: inline-block; background-color: #ea580c; color: #ffffff; text-decoration: none; padding: 12px 28px; border-radius: 6px; font-weight: bold; font-size: 14px;">
                        Check Ticket Status Online &rarr;
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
