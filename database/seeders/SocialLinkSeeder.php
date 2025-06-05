<?php

namespace Database\Seeders;

use App\Models\SocialLink;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $links = [
            'Facebook'          => 'https://www.facebook.com/profile.php?id=61561559271304',
            'Twitter'           => 'https://x.com/erprakash1999',
            'Instagram'         => 'https://www.instagram.com/erprakash1999',
            'LinkedIn'          => 'https://www.linkedin.com/in/erprakash1999/',
            'Pinterest'         => 'https://www.pinterest.com/erprakash1999',
            'TikTok'            => 'https://www.tiktok.com/@erprakash1999',
            'YouTube'           => 'https://www.youtube.com/channel/erprakash1999',
            'Snapchat'          => 'https://www.snapchat.com/add/erprakash1999',
            'Reddit'            => 'https://www.reddit.com/user/erprakash1999',
            'WhatsApp'          => 'https://wa.me/yourwhatsappnumber',
            'Email'             => 'mailto:er.chandraprakash1999@gmail.com',
        ];

        foreach ($links as $platform => $url) {
            SocialLink::updateOrCreate(
                ['user_id' => user_id(), 'platform' => $platform],
                ['url' => $url]
            );
        }
    }
}
