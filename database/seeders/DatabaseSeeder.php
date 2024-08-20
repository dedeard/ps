<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Pharmacy;
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


        Doctor::factory()->create([
            'user_id' => User::factory()->create([
                'name' => 'Admin Dokter',
                'email' => 'dokter@admin.com',
                'password' => Hash::make('11223344'),
            ])
        ]);

        Pharmacy::factory()->create([
            'user_id' => User::factory()->create([
                'name' => 'Admin Dokter',
                'email' => 'apotek@admin.com',
                'password' => Hash::make('11223344'),
            ])
        ]);

        Doctor::factory()->count(10)->create();
        Pharmacy::factory()->count(3)->create();
        $this->call(FornasSeeder::class);
    }
}
