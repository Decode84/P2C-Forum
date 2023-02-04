<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'type',
        'expires_at',
        'redeemed_at',
        'redeemed_by',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'redeemed_at' => 'datetime',
    ];

    public function redeem(User $user)
    {
        $this->update([
            'redeemed_at' => now(),
            'redeemed_by' => $user->id,
        ]);
    }

    public function scopeRedeemed($query)
    {
        return $query->whereNotNull('redeemed_at');
    }

    public function scopeUnredeemed($query)
    {
        return $query->whereNull('redeemed_at');
    }

    public function scopeExpired($query)
    {
        return $query->whereNotNull('expires_at')->where('expires_at', '<', now());
    }

    public function scopeUnexpired($query)
    {
        return $query->whereNull('expires_at')->orWhere('expires_at', '>=', now());
    }

    public function scopeOfType($query, string $type)
    {
        return $query->where('type', $type);
    }

    public function scopeOfCode($query, string $code)
    {
        return $query->where('code', $code);
    }
}
