<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\HeroSection;
use App\Models\Feature;
use App\Models\SiteStat;
use App\Models\Faq;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // User Admin - Skip if exists
        if (!User::where('email', 'fauzansupriyadi1@gmail.com')->exists()) {
            User::create([
                'name' => 'fauzan',
                'email' => 'fauzansupriyadi1@gmail.com',
                'password' => Hash::make('343422'),
                'email_verified_at' => now(),
            ]);
        }

        // Hero Section
        HeroSection::create([
            'title' => "Hi, I'm Fauzan — IT Generalist",
            'description' => 'From web development to network infrastructure, I build complete digital solutions from the ground up. Turning complex technical challenges into seamless reality.',
            'badge_text' => 'Available for Projects',
            'primary_cta_text' => 'Hire Me',
            'primary_cta_url' => 'https://wa.me/6288294625835',
            'secondary_cta_text' => 'View Projects',
            'secondary_cta_url' => '#projects',
            'is_active' => true,
        ]);

        // Features - About
        Feature::create([
            'title' => 'Full-Stack Development',
            'subtitle' => 'Laravel • Vue • React',
            'description' => 'Building robust web applications with modern frameworks and clean architecture.',
            'category' => 'about',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        Feature::create([
            'title' => 'UI/UX Design',
            'subtitle' => 'Figma • Tailwind CSS',
            'description' => 'Creating beautiful and intuitive user interfaces that users love.',
            'category' => 'about',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        Feature::create([
            'title' => 'Network Engineering',
            'subtitle' => 'Cisco • Mikrotik',
            'description' => 'Designing and maintaining secure network infrastructure for businesses.',
            'category' => 'about',
            'sort_order' => 3,
            'is_active' => true,
        ]);

        // Features - Projects
        Feature::create([
            'title' => 'E-Commerce Platform',
            'subtitle' => 'Laravel • MySQL • Stripe',
            'description' => 'Full-featured online store with inventory management and payment gateway integration.',
            'category' => 'projects',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        Feature::create([
            'title' => 'SaaS Dashboard',
            'subtitle' => 'React • Node.js • PostgreSQL',
            'description' => 'Analytics dashboard with real-time data visualization and reporting.',
            'category' => 'projects',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        Feature::create([
            'title' => 'Mobile App Backend',
            'subtitle' => 'Laravel API • JWT • Redis',
            'description' => 'RESTful API serving mobile apps with authentication and caching.',
            'category' => 'projects',
            'sort_order' => 3,
            'is_active' => true,
        ]);

        Feature::create([
            'title' => 'Network Infrastructure',
            'subtitle' => 'Mikrotik • VLAN • VPN',
            'description' => 'Enterprise network setup with security and redundancy.',
            'category' => 'projects',
            'sort_order' => 4,
            'is_active' => true,
        ]);

        // Features - Facility
        Feature::create([
            'title' => 'Available for Freelance',
            'description' => 'Open for new projects and collaborations. Let\'s build something amazing together!',
            'category' => 'facility',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        // Site Stats
        SiteStat::create([
            'label' => 'Years Experience',
            'value' => '3+',
            'description' => 'Professional experience in web development',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        SiteStat::create([
            'label' => 'Projects Completed',
            'value' => '50+',
            'description' => 'Successful projects delivered',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        SiteStat::create([
            'label' => 'Happy Clients',
            'value' => '20+',
            'description' => 'Satisfied clients worldwide',
            'sort_order' => 3,
            'is_active' => true,
        ]);

        SiteStat::create([
            'label' => 'Technologies',
            'value' => '15+',
            'description' => 'Tools and frameworks mastered',
            'sort_order' => 4,
            'is_active' => true,
        ]);

        // FAQs
        Faq::create([
            'question' => 'What services do you offer?',
            'answer' => 'I offer full-stack web development, UI/UX design, network infrastructure setup, and technical consulting services.',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        Faq::create([
            'question' => 'How long does a typical project take?',
            'answer' => 'Project timelines vary depending on scope and complexity. A simple website can take 1-2 weeks, while complex applications may take 2-3 months.',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        Faq::create([
            'question' => 'Do you work remotely?',
            'answer' => 'Yes! I work remotely with clients worldwide. I\'m available for communication via WhatsApp, email, or video calls.',
            'sort_order' => 3,
            'is_active' => true,
        ]);

        Faq::create([
            'question' => 'What are your rates?',
            'answer' => 'Rates depend on project scope and requirements. Contact me for a detailed quote based on your specific needs.',
            'sort_order' => 4,
            'is_active' => true,
        ]);

        // Settings
        $settings = [
            ['key' => 'site_name', 'value' => 'Fauzan.Syd', 'group' => 'general', 'type' => 'text', 'label' => 'Site Name'],
            ['key' => 'site_description', 'value' => 'Full-Stack Developer & Network Engineer', 'group' => 'general', 'type' => 'text', 'label' => 'Site Description'],
            ['key' => 'contact_email', 'value' => 'fauzansupriyadi1@gmail.com', 'group' => 'contact', 'type' => 'email', 'label' => 'Contact Email'],
            ['key' => 'contact_phone', 'value' => '+62 882 9462 5835', 'group' => 'contact', 'type' => 'text', 'label' => 'Contact Phone'],
            ['key' => 'whatsapp_url', 'value' => 'https://wa.me/6288294625835', 'group' => 'contact', 'type' => 'url', 'label' => 'WhatsApp URL'],
            ['key' => 'github_url', 'value' => 'https://github.com/fauzansyd', 'group' => 'social', 'type' => 'url', 'label' => 'GitHub URL'],
            ['key' => 'linkedin_url', 'value' => 'https://linkedin.com/in/fauzansyd', 'group' => 'social', 'type' => 'url', 'label' => 'LinkedIn URL'],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }

        $this->command->info('✅ Database seeded successfully!');
        $this->command->info('📧 Login: fauzansupriyadi1@gmail.com');
        $this->command->info('🔑 Password: 343422');
    }
}
