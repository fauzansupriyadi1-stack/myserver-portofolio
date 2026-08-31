<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\Feature;
use App\Models\Project;
use App\Models\SiteStat;
use App\Models\Faq;
use App\Models\Setting;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Skill;
use App\Models\Certification;
use Illuminate\View\View;

class LandingController extends Controller
{
    public function index(): View
    {
        $projectsCount = Project::where('is_active', true)->count();
        $certificationsCount = Certification::where('is_active', true)->count();
        $experiencesCount = Experience::where('is_active', true)->count();
        $skillsCount = Skill::where('is_active', true)->count();
        $data = [
            'hero' => HeroSection::select(['id', 'badge_text', 'title', 'description', 'primary_cta_text', 'primary_cta_url', 'secondary_cta_text', 'secondary_cta_url', 'background_image'])
                ->where('is_active', true)->first(),
            'about' => Feature::select(['id', 'title', 'subtitle', 'description', 'image_path', 'sort_order'])
                ->where('is_active', true)->where('category', 'about')->orderBy('sort_order')->get(),
            'projects' => Project::select(['id', 'title', 'description', 'image_path', 'technologies', 'url', 'sort_order'])
                ->where('is_active', true)->orderBy('sort_order')->limit(4)->get(),
            'projects_total' => $projectsCount,
            'facility' => Feature::select(['id', 'title', 'description', 'sort_order'])
                ->where('is_active', true)->where('category', 'facility')->orderBy('sort_order')->get(),
            'stats' => SiteStat::select(['id', 'label', 'value', 'description', 'sort_order'])
                ->where('is_active', true)->orderBy('sort_order')->get(),
            'faqs' => Faq::select(['id', 'question', 'answer', 'sort_order'])
                ->where('is_active', true)->orderBy('sort_order')->get(),
            'settings' => Setting::allKeyed(),
        ];

        return view('welcome', array_merge($data, [
            'projects_count'       => $projectsCount,
            'certifications_count' => $certificationsCount,
            'experiences_count'    => $experiencesCount,
            'skills_count'         => $skillsCount,
        ]));
    }

    public function about(): View
    {
        $settings = Setting::allKeyed();
        return view('about', compact('settings'));
    }

    public function cv(): View
    {
        $settings  = Setting::allKeyed();
        $experiences = Experience::where('is_active', true)
            ->orderBy('is_current', 'desc')
            ->orderBy('start_date', 'desc')
            ->get();
        $education = Education::where('is_active', true)
            ->orderBy('is_current', 'desc')
            ->orderBy('start_date', 'desc')
            ->get();

        return view('cv', compact('settings', 'experiences', 'education'));
    }

    public function skills(): View
    {
        $settings = Setting::allKeyed();
        $skills   = Skill::where('is_active', true)
            ->orderBy('sort_order')
            ->get()
            ->groupBy('category');

        return view('skills', compact('settings', 'skills'));
    }

    public function certifications(): View
    {
        $settings       = Setting::allKeyed();
        $certifications = Certification::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('certifications', compact('settings', 'certifications'));
    }

    public function projects(): View
    {
        $settings = Setting::allKeyed();
        $projects = Project::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('projects', compact('settings', 'projects'));
    }
}
