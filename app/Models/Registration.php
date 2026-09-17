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
        'contest_categories',
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
        'contest_categories' => 'array',
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
        if ($this->registration_type === 'contestant') {
            return 'Contestant Pass';
        }

        return match ($this->ticket_type) {
            'day1' => 'Day 1 Ticket',
            'day2' => 'Day 2 Ticket',
            'both' => 'Both Days (Day 1 & Day 2) Pass',
            default => 'Standard Pass',
        };
    }

    /**
     * Formatted Price Attribute
     */
    public function getFormattedPriceAttribute(): string
    {
        return '₱' . number_format($this->ticket_price, 2);
    }

    /**
     * Get structured categories list
     * @return array
     */
    public function getCategoriesListAttribute(): array
    {
        if (!empty($this->contest_categories) && is_array($this->contest_categories)) {
            return $this->contest_categories;
        }

        if (!empty($this->contest_category)) {
            // Check if it contains commas or newlines from legacy records
            $items = preg_split('/[\n\r,]+/', $this->contest_category);
            $result = [];
            foreach ($items as $item) {
                $trimmed = trim($item);
                if ($trimmed !== '') {
                    $result[] = [
                        'name' => $trimmed,
                        'division' => null,
                        'fee' => null,
                    ];
                }
            }
            return !empty($result) ? $result : [['name' => $this->contest_category, 'division' => null, 'fee' => $this->ticket_price]];
        }

        return [];
    }

    /**
     * Availed Pass / Competition Summary Attribute
     */
    public function getAvailedSummaryAttribute(): string
    {
        if ($this->registration_type === 'contestant') {
            $list = $this->categories_list;
            if (count($list) > 1) {
                return count($list) . ' Competition Categories';
            }
            return $this->contest_category ?? 'Contestant Competition Entry';
        }
        return $this->ticket_type_label;
    }
}
