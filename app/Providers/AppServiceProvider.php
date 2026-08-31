<?php

namespace App\Providers;

use App\Models\Faq;
use App\Models\Feature;
use App\Models\HeroSection;
use App\Models\SiteStat;
use App\Observers\FaqObserver;
use App\Observers\FeatureObserver;
use App\Observers\HeroSectionObserver;
use App\Observers\SiteStatObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register observers untuk auto-clear cache
        Feature::observe(FeatureObserver::class);
        Faq::observe(FaqObserver::class);
        HeroSection::observe(HeroSectionObserver::class);
        SiteStat::observe(SiteStatObserver::class);
    }
}
