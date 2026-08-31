<?php

namespace App\Observers;

use App\Models\HeroSection;
use Illuminate\Support\Facades\Cache;

class HeroSectionObserver
{
    private function clearCache(): void
    {
        Cache::forget('landing_page_data');
        Cache::forget('landing_page_data_v2');
    }

    public function created(HeroSection $heroSection): void
    {
        $this->clearCache();
    }

    public function updated(HeroSection $heroSection): void
    {
        $this->clearCache();
    }

    public function deleted(HeroSection $heroSection): void
    {
        $this->clearCache();
    }

    public function restored(HeroSection $heroSection): void
    {
        $this->clearCache();
    }
}
