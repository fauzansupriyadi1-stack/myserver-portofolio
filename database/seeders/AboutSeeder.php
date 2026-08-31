<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    public function run(): void
    {
        // Insert About data
        Feature::updateOrCreate(
            [
                'category' => 'about',
                'sort_order' => 0
            ],
            [
                'title' => 'Full-Stack Development',
                'subtitle' => 'Laravel • Vue • React',
                'description' => 'Building robust web applications with modern frameworks and clean architecture.',
                'image_path' => 'about/profile.jpg', // Foto yang akan diupload manual
                'is_active' => true,
            ]
        );
    }
}
