<?php

namespace Database\Seeders;

use App\Models\ProfileDetail;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::factory()->create([
            'name' => 'VtuberCommunity',
            'email' => 'amberdekoster03@gmail.com',
            'password' => Hash::make('Amf@Ht1s'),
            'is_admin' => 1
        ]);
        $member = User::factory()->create([
            'name' => 'Anemoia',
            'email' => 'killboy1100@gmail.com',
            'password' => Hash::make('Amf@Ht1s'),
            'is_admin' => 0
        ]);
        ProfileDetail::create(['user_id' => $admin->id]);
        ProfileDetail::create(['user_id' => $member->id]);
    }
}
