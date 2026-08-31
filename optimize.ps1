# Script Optimasi Production untuk Laravel Portfolio (Windows)
# Jalankan: .\optimize.ps1

Write-Host "🚀 Memulai optimasi production..." -ForegroundColor Green

# Clear semua cache
Write-Host "📦 Clearing all caches..." -ForegroundColor Yellow
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Optimize untuk production
Write-Host "⚡ Optimizing for production..." -ForegroundColor Yellow
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

# Optimize composer autoload
Write-Host "🎯 Optimizing Composer autoload..." -ForegroundColor Yellow
composer install --optimize-autoloader --no-dev

# Build assets
Write-Host "🎨 Building frontend assets..." -ForegroundColor Yellow
npm run build

Write-Host ""
Write-Host "✅ Optimasi selesai!" -ForegroundColor Green
Write-Host ""
Write-Host "📊 Checklist Production:" -ForegroundColor Cyan
Write-Host "  ✓ Cache config, routes, views"
Write-Host "  ✓ Autoload optimization"
Write-Host "  ✓ Assets compiled"
Write-Host ""
Write-Host "💡 Jangan lupa:" -ForegroundColor Yellow
Write-Host "  - Set APP_ENV=production di .env"
Write-Host "  - Set APP_DEBUG=false di .env"
Write-Host "  - Gunakan CACHE_STORE=file atau redis untuk performa optimal"
Write-Host "  - Set SESSION_DRIVER=redis untuk multiple servers"
