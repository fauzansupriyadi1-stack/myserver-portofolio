<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add indexes to faqs table
        Schema::table('faqs', function (Blueprint $table) {
            $table->index('is_active');
            $table->index(['is_active', 'sort_order']);
        });

        // Add indexes to features table
        Schema::table('features', function (Blueprint $table) {
            $table->index('is_active');
            $table->index('category');
            $table->index(['is_active', 'category', 'sort_order']);
        });

        // Add indexes to hero_sections table
        Schema::table('hero_sections', function (Blueprint $table) {
            $table->index('is_active');
        });

        // Add indexes to site_stats table
        Schema::table('site_stats', function (Blueprint $table) {
            $table->index('is_active');
            $table->index(['is_active', 'sort_order']);
        });

        // Add indexes to settings table
        Schema::table('settings', function (Blueprint $table) {
            $table->index('key');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('faqs', function (Blueprint $table) {
            $table->dropIndex(['is_active']);
            $table->dropIndex(['is_active', 'sort_order']);
        });

        Schema::table('features', function (Blueprint $table) {
            $table->dropIndex(['is_active']);
            $table->dropIndex(['category']);
            $table->dropIndex(['is_active', 'category', 'sort_order']);
        });

        Schema::table('hero_sections', function (Blueprint $table) {
            $table->dropIndex(['is_active']);
        });

        Schema::table('site_stats', function (Blueprint $table) {
            $table->dropIndex(['is_active']);
            $table->dropIndex(['is_active', 'sort_order']);
        });

        Schema::table('settings', function (Blueprint $table) {
            $table->dropIndex(['key']);
        });
    }
};
