<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_number',
        'registration_type',
        'name',
        'is_ublc',
        'school',
        'contest_category',
        'contact_number',
        'ticket_type',
        'ticket_price',
        'email',
        'gcash_name',
        'gcash_number',
        'reference_number',
        'payment_screenshot',
        'status',
    ];

    protected $casts = [
        'is_ublc' => 'boolean',
        'ticket_price' => 'integer',
    ];

    /**
     * Generate unique ticket number e.g. #NFS_2026_001
     */
    public static function generateTicketNumber(): string
    {
        $latest = static::latest('id')->first();
        $nextId = $latest ? $latest->id + 1 : 1;
        return '#NFS_2026_' . str_pad($nextId, 3, '0', STR_PAD_LEFT);
    }

    /**
     * Ticket Type display label
     */
    public function getTicketTypeLabelAttribute(): string
    {
        return match ($this->ticket_type) {
            'day1' => 'Day 1 Ticket',
            'day2' => 'Day 2 Ticket',
            'both' => 'Both Days (Day 1 & Day 2) Ticket',
            default => 'Standard Ticket',
        };
    }

    /**
     * Formatted Price Attribute
     */
    public function getFormattedPriceAttribute(): string
    {
        return '₱' . number_format($this->ticket_price, 2);
    }
}
