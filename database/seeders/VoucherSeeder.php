<?php

namespace Database\Seeders;

use App\Models\Voucher;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 25 random vouchers codes for testing in a loop
        for ($i = 0; $i < 25; $i++) {
            $bytes = random_bytes(5);
            $code = bin2hex($bytes);

            Voucher::create([
                'code' => $code,
                'expires_at' => now()->addDays(30),
                'type' => 'invite',
                'created_at' => now(),
            ]);
        }
    }
}
