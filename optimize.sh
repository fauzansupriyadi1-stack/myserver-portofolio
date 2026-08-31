#!/bin/bash

# Script Optimasi Production untuk Laravel Portfolio
# Jalankan script ini setiap kali deploy ke production

echo "🚀 Memulai optimasi production..."

# Clear semua cache
echo "📦 Clearing all caches..."
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Optimize untuk production
echo "⚡ Optimizing for production..."
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

# Optimize composer autoload
echo "🎯 Optimizing Composer autoload..."
composer install --optimize-autoloader --no-dev

# Build assets
echo "🎨 Building frontend assets..."
npm run build

# Set permissions (optional, sesuaikan dengan environment)
echo "🔐 Setting permissions..."
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache

echo "✅ Optimasi selesai!"
echo ""
echo "📊 Checklist Production:"
echo "  ✓ Cache config, routes, views"
echo "  ✓ Autoload optimization"
echo "  ✓ Assets compiled"
echo "  ✓ Permissions set"
echo ""
echo "💡 Jangan lupa:"
echo "  - Set APP_ENV=production di .env"
echo "  - Set APP_DEBUG=false di .env"
echo "  - Gunakan CACHE_STORE=redis untuk performa optimal"
echo "  - Set SESSION_DRIVER=redis untuk multiple servers"
