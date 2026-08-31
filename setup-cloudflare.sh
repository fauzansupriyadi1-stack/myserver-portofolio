#!/bin/bash

# ===================================================================
# CLOUDFLARE TUNNEL SETUP SCRIPT untuk porto.fauzan.online
# ===================================================================
# Script ini akan setup environment untuk Cloudflare Tunnel
# 
# Cara pakai:
# chmod +x setup-cloudflare.sh
# ./setup-cloudflare.sh
# ===================================================================

echo "🚀 Setup Cloudflare Tunnel untuk porto.fauzan.online"
echo "=================================================="
echo ""

# Cek apakah ada .env lama
if [ ! -f .env ]; then
    echo "❌ File .env tidak ditemukan!"
    echo "📋 Membuat .env dari template..."
    cp .env.production.example .env
    echo "⚠️  PENTING: Edit .env dan isi APP_KEY serta DB_PASSWORD!"
    echo "   Jalankan: nano .env"
    exit 1
fi

# Backup .env lama
echo "📦 Backup .env lama..."
cp .env .env.backup.$(date +%Y%m%d_%H%M%S)

# Ambil APP_KEY dan DB_PASSWORD dari .env lama
echo "🔑 Mengambil APP_KEY dan DB_PASSWORD dari .env lama..."
OLD_APP_KEY=$(grep "^APP_KEY=" .env | cut -d '=' -f2-)
OLD_DB_PASSWORD=$(grep "^DB_PASSWORD=" .env | cut -d '=' -f2-)

# Copy template baru
echo "📝 Membuat .env baru dari template..."
cp .env.production.example .env.new

# Replace APP_KEY dan DB_PASSWORD
if [ -n "$OLD_APP_KEY" ]; then
    sed -i "s|APP_KEY=.*|APP_KEY=$OLD_APP_KEY|g" .env.new
    echo "✅ APP_KEY sudah di-restore"
else
    echo "⚠️  APP_KEY tidak ditemukan di .env lama"
fi

if [ -n "$OLD_DB_PASSWORD" ]; then
    sed -i "s|DB_PASSWORD=.*|DB_PASSWORD=$OLD_DB_PASSWORD|g" .env.new
    echo "✅ DB_PASSWORD sudah di-restore"
else
    echo "⚠️  DB_PASSWORD tidak ditemukan di .env lama"
fi

# Ganti .env dengan yang baru
mv .env.new .env

echo ""
echo "✅ Setup selesai!"
echo ""
echo "📋 Konfigurasi untuk porto.fauzan.online:"
echo "   - APP_URL: https://porto.fauzan.online"
echo "   - SESSION_DOMAIN: .fauzan.online"
echo "   - SESSION_SECURE_COOKIE: true"
echo ""
echo "🧹 Clear cache..."
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan optimize:clear

echo ""
echo "🔧 Rebuild cache..."
php artisan config:cache
php artisan optimize

echo ""
echo "✅ Semua selesai!"
echo ""
echo "🚀 Restart Laravel serve dengan:"
echo "   screen -r laravel"
echo "   Ctrl+C untuk stop"
echo "   php artisan serve --host=0.0.0.0 --port=8000"
echo "   Ctrl+A lalu D untuk detach"
echo ""
echo "🌐 Test login di: https://porto.fauzan.online/admin"
echo ""
