<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Expand the ENUM to include 'projects' and 'skills'
        DB::statement("ALTER TABLE features MODIFY COLUMN category ENUM('about','academy','facility','projects','skills') NOT NULL DEFAULT 'about'");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE features MODIFY COLUMN category ENUM('about','academy','facility') NOT NULL DEFAULT 'about'");
    }
};
