#!/bin/bash

# ===================================================================
# SCRIPT FIX LOGIN CLOUDFLARE TUNNEL
# ===================================================================
# Script ini akan fix masalah login di porto.fauzan.online
# Jalankan di server dengan: chmod +x fix-login.sh && ./fix-login.sh
# ===================================================================

echo "🔧 Fix Login untuk porto.fauzan.online"
echo "======================================"
echo ""

cd /var/www/myserver-portofolio

# Backup .env
echo "📦 Backup .env..."
cp .env .env.backup.fix.$(date +%Y%m%d_%H%M%S)

# Fix SESSION_DOMAIN
echo "🔧 Fixing SESSION_DOMAIN..."
sed -i 's/SESSION_DOMAIN=.*/SESSION_DOMAIN=porto.fauzan.online/' .env

# Fix SESSION_SECURE_COOKIE
echo "🔧 Fixing SESSION_SECURE_COOKIE..."
sed -i 's/SESSION_SECURE_COOKIE=.*/SESSION_SECURE_COOKIE=false/' .env

# Verify changes
echo ""
echo "✅ Perubahan yang dilakukan:"
echo "----------------------------"
grep "SESSION_DOMAIN" .env
grep "SESSION_SECURE_COOKIE" .env
echo ""

# Clear cache
echo "🧹 Clear cache..."
php artisan config:clear
php artisan cache:clear
php artisan optimize

echo ""
echo "🔄 Restart service..."
systemctl restart laravel-portfolio

echo ""
echo "✅ SELESAI!"
echo ""
echo "🌐 Test login di: https://porto.fauzan.online/admin"
echo "📧 Email: fauzansupriyadi1@gmail.com"
echo "🔑 Password: 343422"
echo ""
echo "🎉 Tombol Masuk sekarang harusnya work!"
echo ""
