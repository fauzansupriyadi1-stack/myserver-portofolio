<?php

namespace App\Observers;

use App\Models\SiteStat;
use Illuminate\Support\Facades\Cache;

class SiteStatObserver
{
    private function clearCache(): void
    {
        Cache::forget('landing_page_data');
    }

    public function created(SiteStat $siteStat): void
    {
        $this->clearCache();
    }

    public function updated(SiteStat $siteStat): void
    {
        $this->clearCache();
    }

    public function deleted(SiteStat $siteStat): void
    {
        $this->clearCache();
    }

    public function restored(SiteStat $siteStat): void
    {
        $this->clearCache();
    }
}
