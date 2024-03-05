<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::class([
            'name' => 'Home',
            'main_path' => 'home',
            'logo_class' => 'fa fa-home',
            'logo_path' => '',
        ]);

        Menu::class([
            'name' => 'Profile',
            'main_path' => 'profile',
            'logo_class' => 'fa fa-user',
            'logo_path' => '',
        ]);

        Menu::class([
            'name' => 'Task',
            'main_path' => 'task',
            'logo_class' => 'fa fa-dashboard',
            'logo_path' => '',
        ]);
    }
}
