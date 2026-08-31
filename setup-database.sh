#!/bin/bash

# ===================================================================
# SETUP DATABASE - Fix Error 500
# ===================================================================

echo "🔧 Setup Database untuk Portfolio"
echo "=================================="
echo ""

cd /var/www/myserver-portofolio

# Step 1: Check MySQL
echo "📊 Step 1: Check MySQL Service"
echo "==============================="
systemctl is-active mysql
if [ $? -eq 0 ]; then
    echo "✅ MySQL is running"
else
    echo "❌ MySQL is NOT running"
    echo "Starting MySQL..."
    systemctl start mysql
fi

echo ""
echo "📦 Step 2: Create Database & User"
echo "=================================="

# Get DB password from .env
DB_PASSWORD=$(grep "^DB_PASSWORD=" .env | cut -d '=' -f2)

# Create database
mysql -u root <<EOF
CREATE DATABASE IF NOT EXISTS portfolio_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER IF NOT EXISTS 'portfolio_user'@'localhost' IDENTIFIED BY '$DB_PASSWORD';
GRANT ALL PRIVILEGES ON portfolio_db.* TO 'portfolio_user'@'localhost';
FLUSH PRIVILEGES;
EOF

if [ $? -eq 0 ]; then
    echo "✅ Database created/exists"
else
    echo "❌ Failed to create database"
    echo "Trying without password..."
    mysql <<EOF
CREATE DATABASE IF NOT EXISTS portfolio_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER IF NOT EXISTS 'portfolio_user'@'localhost' IDENTIFIED BY '$DB_PASSWORD';
GRANT ALL PRIVILEGES ON portfolio_db.* TO 'portfolio_user'@'localhost';
FLUSH PRIVILEGES;
EOF
fi

echo ""
echo "📊 Step 3: Run Migrations"
echo "========================="

php artisan migrate --force

if [ $? -eq 0 ]; then
    echo "✅ Migrations completed"
else
    echo "❌ Migration failed"
    exit 1
fi

echo ""
echo "📦 Step 4: Seed Database"
echo "========================"

php artisan db:seed --force

if [ $? -eq 0 ]; then
    echo "✅ Database seeded"
else
    echo "⚠️  Seeding failed (optional)"
fi

echo ""
echo "🧹 Step 5: Clear Cache"
echo "======================"

php artisan config:clear
php artisan cache:clear
php artisan optimize

echo ""
echo "🔄 Step 6: Restart Application"
echo "==============================="

pkill -f "php artisan serve"
sleep 2
php artisan serve --host=0.0.0.0 --port=8000 &

echo ""
echo "=================================================="
echo "✅ SETUP COMPLETED!"
echo "=================================================="
echo ""
echo "🌐 Test di: https://porto.fauzan.online"
echo ""
echo "📊 Database Status:"
mysql -u portfolio_user -p$DB_PASSWORD portfolio_db -e "SHOW TABLES;" 2>/dev/null
echo ""
