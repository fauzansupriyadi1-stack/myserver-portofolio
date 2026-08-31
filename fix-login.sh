#!/bin/bash

# ===================================================================
# FIX UPLOAD SLOW - Increase PHP Limits
# ===================================================================

echo "🔧 Fix Upload Slow Problem"
echo "==========================="
echo ""

cd /var/www/myserver-portofolio

# Copy php.ini ke server
echo "📦 Setting PHP limits..."

# Update systemd service dengan php.ini custom
cat > /etc/systemd/system/laravel-portfolio.service <<EOF
[Unit]
Description=Laravel Portfolio Application
After=network.target

[Service]
Type=simple
User=root
WorkingDirectory=/var/www/myserver-portofolio
ExecStart=/usr/bin/php -c /var/www/myserver-portofolio/php-upload.ini artisan serve --host=0.0.0.0 --port=8000
Restart=always
RestartSec=3

[Install]
WantedBy=multi-user.target
EOF

echo "✅ Service file updated with custom php.ini"

# Reload systemd
systemctl daemon-reload

# Restart service
echo "🔄 Restarting service..."
pkill -f "php artisan serve"
sleep 2

# Start dengan php.ini custom
php -c php-upload.ini artisan serve --host=0.0.0.0 --port=8000 &

echo ""
echo "✅ Upload limits increased:"
echo "   upload_max_filesize: 100M"
echo "   post_max_size: 100M"
echo "   max_execution_time: 300s"
echo "   memory_limit: 512M"
echo ""
echo "🌐 Test upload di: https://porto.fauzan.online/admin"
echo ""
