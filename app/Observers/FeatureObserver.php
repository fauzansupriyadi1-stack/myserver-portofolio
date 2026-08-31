<?php

namespace App\Observers;

use App\Models\Feature;
use Illuminate\Support\Facades\Cache;

class FeatureObserver
{
    /**
     * Clear landing page cache when features are modified.
     */
    private function clearCache(): void
    {
        Cache::forget('landing_page_data');
        Cache::forget('landing_page_data_v2');
    }

    /**
     * Handle the Feature "created" event.
     */
    public function created(Feature $feature): void
    {
        $this->clearCache();
    }

    /**
     * Handle the Feature "updated" event.
     */
    public function updated(Feature $feature): void
    {
        $this->clearCache();
    }

    /**
     * Handle the Feature "deleted" event.
     */
    public function deleted(Feature $feature): void
    {
        $this->clearCache();
    }

    /**
     * Handle the Feature "restored" event.
     */
    public function restored(Feature $feature): void
    {
        $this->clearCache();
    }
}
