<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            ['name' => 'Home', 'link' => '/', 'status' => true],
            ['name' => 'About', 'link' => '/about', 'status' => true],
            ['name' => 'Services', 'link' => '/services', 'status' => true],
            ['name' => 'Portfolio', 'link' => '/portfolio', 'status' => true],
            ['name' => 'Blog', 'link' => '/blog', 'status' => true],
            ['name' => 'Contact', 'link' => '/contact', 'status' => true],
        ];

        foreach ($menus as $menuData) {
            $menuData['user_id'] = user_id();
            Menu::updateOrCreate(
                ['link' => $menuData['link'], 'user_id' => user_id()], // unique key to check
                $menuData
            );
        }
    }
}
