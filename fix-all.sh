#!/bin/bash

# ===================================================================
# FIX ALL PROBLEMS - Portfolio Fauzan
# ===================================================================
# Script ini akan fix semua masalah:
# - Fix login Cloudflare Tunnel
# - Restart service
# - Check dan fix port 8000
# ===================================================================

echo "🔧 Fix All Problems - Portfolio Fauzan"
echo "======================================"
echo ""

cd /var/www/myserver-portofolio

echo "📊 Step 1: Check Current Status"
echo "================================"
echo ""

# Check if Laravel is running
echo "Checking Laravel service..."
systemctl is-active laravel-portfolio
SERVICE_STATUS=$?

if [ $SERVICE_STATUS -eq 0 ]; then
    echo "✅ Service is running"
else
    echo "❌ Service is NOT running"
fi

# Check port 8000
echo ""
echo "Checking port 8000..."
PORT_CHECK=$(lsof -i :8000 2>/dev/null)
if [ -n "$PORT_CHECK" ]; then
    echo "✅ Port 8000 is in use:"
    echo "$PORT_CHECK"
else
    echo "❌ Port 8000 is FREE (nothing listening)"
fi

echo ""
echo "📦 Step 2: Backup & Fix .env"
echo "============================"

# Backup
cp .env .env.backup.$(date +%Y%m%d_%H%M%S)
echo "✅ .env backed up"

# Fix SESSION_DOMAIN
sed -i 's/SESSION_DOMAIN=.*/SESSION_DOMAIN=porto.fauzan.online/' .env
echo "✅ SESSION_DOMAIN fixed"

# Fix SESSION_SECURE_COOKIE
sed -i 's/SESSION_SECURE_COOKIE=.*/SESSION_SECURE_COOKIE=false/' .env
echo "✅ SESSION_SECURE_COOKIE fixed"

# Verify
echo ""
echo "Current .env config:"
grep -E "APP_URL|SESSION_DOMAIN|SESSION_SECURE" .env

echo ""
echo "🧹 Step 3: Clear Cache"
echo "======================"

php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan optimize

echo ""
echo "🔄 Step 4: Kill Old Processes"
echo "=============================="

# Kill any old php artisan serve
echo "Killing old processes..."
pkill -f "php artisan serve"
sleep 2
echo "✅ Old processes killed"

echo ""
echo "🚀 Step 5: Restart Service"
echo "=========================="

# Restart systemd service
systemctl restart laravel-portfolio
sleep 3

# Check if started
systemctl is-active laravel-portfolio
if [ $? -eq 0 ]; then
    echo "✅ Service started successfully"
else
    echo "❌ Service failed to start"
    echo ""
    echo "Last 20 lines of log:"
    journalctl -u laravel-portfolio -n 20 --no-pager
fi

echo ""
echo "📊 Step 6: Final Status Check"
echo "=============================="

# Check port again
PORT_CHECK=$(lsof -i :8000 2>/dev/null | grep LISTEN)
if [ -n "$PORT_CHECK" ]; then
    echo "✅ Port 8000 is now listening:"
    echo "$PORT_CHECK"
else
    echo "❌ Port 8000 still not listening!"
    echo ""
    echo "Trying manual start..."
    cd /var/www/myserver-portofolio
    php artisan serve --host=0.0.0.0 --port=8000 &
    sleep 3
    echo "Manual start attempted"
fi

# Check service
echo ""
echo "Service status:"
systemctl status laravel-portfolio --no-pager | head -15

echo ""
echo "=================================================="
echo "✅ FIX COMPLETED!"
echo "=================================================="
echo ""
echo "🌐 Test di browser:"
echo "   Local: http://192.168.1.23:8000"
echo "   Cloudflare: https://porto.fauzan.online"
echo ""
echo "📋 Useful commands:"
echo "   Status:  sudo systemctl status laravel-portfolio"
echo "   Log:     sudo journalctl -u laravel-portfolio -f"
echo "   Restart: sudo systemctl restart laravel-portfolio"
echo ""
