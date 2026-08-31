<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus semua user dulu
        User::truncate();
        
        // Buat user baru
        $user = User::create([
            'name' => 'fauzan',
            'email' => 'fauzansupriyadi1@gmail.com',
            'password' => Hash::make('343422'),
        ]);
        
        $this->command->info('✅ User admin berhasil dibuat!');
        $this->command->info('📧 Email: fauzansupriyadi1@gmail.com');
        $this->command->info('🔑 Password: 343422');
        $this->command->info('👤 Name: fauzan');
    }
}
