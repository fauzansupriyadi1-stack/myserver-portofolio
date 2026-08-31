#!/bin/bash

# ===================================================================
# FIX UPLOAD PERMISSIONS - Auto Run After Upload
# ===================================================================
# Script ini akan fix permission file yang baru di-upload
# Bisa di-setup sebagai cron job untuk auto-run

cd /var/www/myserver-portofolio

echo "🔧 Fixing upload permissions..."

# Fix storage folder
chmod -R 755 storage/app/public
find storage/app/public -type f -exec chmod 644 {} \;

# Fix public/storage symlink
chmod -R 755 public/storage
find public/storage -type f -exec chmod 644 {} \;

# Ensure owner is root (sesuai dengan user yang jalankan php artisan serve)
chown -R root:root storage/app/public 2>/dev/null
chown -R root:root public/storage 2>/dev/null

echo "✅ Permissions fixed"

# Optional: clear cache juga
php artisan cache:clear 2>/dev/null

echo "Done!"
