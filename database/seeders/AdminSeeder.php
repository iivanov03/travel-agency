<?php

namespace Database\Seeders;

use App\Models\Admin\Admin;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            "name" => "Admin",
            "email" => "admin@admin.com",
            "password" => Hash::make("12345678"),
        ]);
    }
}
