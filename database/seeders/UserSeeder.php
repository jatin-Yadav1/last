<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id' => user_id(),
                'first_name' => 'Chandra',
                'last_name' => 'Gautam',
                'email' => 'admin@portfolio.com',
                'username' => 'admin',
                'email_verified_at' => now(),
                'alternate_email' => 'alternate@portfolio.com',
                'alternate_email_verified_at' => now(),
                'account_number' => generateAccountNumber(),
                'password' => Hash::make('password123'),
                'number' => '9876543210',
                'number_verified_at' => now(),
                'alternate_number' => '9123456789',
                'alternate_number_verified_at' => now(),
                'logo' => null,
                'image' => null,
                'heading' => 'Full Stack Developer',
                'bio' => "I am a Full-Stack developer based in Pune, India. I am an Information Technology undergraduate from SPPU. I am very passionate about improving my coding skills & developing applications & websites. I build WebApps and Websites using MERN Stack. Working for myself to improve my skills. Love to build Full-Stack clones.",
                'full_address' => "Lucknow, Uttar Pradesh 226012",
            ]
        ];

        foreach ($users as $user) {
            User::updateOrCreate(['id' => $user['id']], $user);
        }
    }
}
