#!/bin/bash

# ===================================================================
# INSTALLER OTOMATIS - Portfolio Fauzan
# ===================================================================
# Script ini akan setup SEMUA yang diperlukan setelah git clone
# 
# Cara pakai:
# git clone https://github.com/fauzansupriyadi1-stack/myserver-portofolio.git
# cd myserver-portofolio
# chmod +x install.sh
# ./install.sh
# ===================================================================

echo "🚀 Portfolio Fauzan - Auto Installer"
echo "===================================="
echo ""

# Warna untuk output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Fungsi untuk print dengan warna
print_success() {
    echo -e "${GREEN}✅ $1${NC}"
}

print_error() {
    echo -e "${RED}❌ $1${NC}"
}

print_info() {
    echo -e "${YELLOW}📋 $1${NC}"
}

# Cek apakah running sebagai root
if [ "$EUID" -ne 0 ]; then 
    print_error "Script ini harus dijalankan sebagai root"
    echo "Jalankan dengan: sudo ./install.sh"
    exit 1
fi

echo "📦 Step 1: Input Konfigurasi"
echo "============================="
echo ""

# Input domain
read -p "🌐 Masukkan domain (contoh: porto.fauzan.online): " DOMAIN
if [ -z "$DOMAIN" ]; then
    DOMAIN="porto.fauzan.online"
    print_info "Menggunakan default: $DOMAIN"
fi

# Extract base domain untuk SESSION_DOMAIN
BASE_DOMAIN=$(echo $DOMAIN | awk -F. '{print $(NF-1)"."$NF}')

# Input database password
read -sp "🔐 Masukkan password database (tekan Enter untuk generate otomatis): " DB_PASSWORD
echo ""
if [ -z "$DB_PASSWORD" ]; then
    DB_PASSWORD=$(openssl rand -base64 32 | tr -d "=+/" | cut -c1-25)
    print_info "Password database di-generate otomatis"
fi

# Input admin email
read -p "📧 Email admin (default: fauzansupriyadi1@gmail.com): " ADMIN_EMAIL
if [ -z "$ADMIN_EMAIL" ]; then
    ADMIN_EMAIL="fauzansupriyadi1@gmail.com"
fi

# Input admin password
read -sp "🔑 Password admin (default: 343422): " ADMIN_PASSWORD
echo ""
if [ -z "$ADMIN_PASSWORD" ]; then
    ADMIN_PASSWORD="343422"
fi

echo ""
print_info "Konfigurasi:"
echo "   Domain: $DOMAIN"
echo "   Base Domain: .$BASE_DOMAIN"
echo "   Admin Email: $ADMIN_EMAIL"
echo ""
read -p "⚠️  Lanjutkan instalasi? (y/n): " CONFIRM
if [ "$CONFIRM" != "y" ]; then
    print_error "Instalasi dibatalkan"
    exit 1
fi

echo ""
echo "📦 Step 2: Install Dependencies"
echo "================================"

# Install Composer dependencies
print_info "Installing Composer dependencies..."
composer install --optimize-autoloader --no-dev
if [ $? -eq 0 ]; then
    print_success "Composer dependencies installed"
else
    print_error "Failed to install Composer dependencies"
    exit 1
fi

echo ""
echo "📦 Step 3: Setup Environment"
echo "============================"

# Setup .env
if [ ! -f .env ]; then
    print_info "Membuat file .env..."
    cp .env.production.example .env
    
    # Generate APP_KEY
    php artisan key:generate --force
    
    # Update konfigurasi di .env
    sed -i "s|APP_URL=.*|APP_URL=https://$DOMAIN|g" .env
    sed -i "s|ASSET_URL=.*|ASSET_URL=https://$DOMAIN|g" .env
    sed -i "s|SESSION_DOMAIN=.*|SESSION_DOMAIN=.$BASE_DOMAIN|g" .env
    sed -i "s|SANCTUM_STATEFUL_DOMAINS=.*|SANCTUM_STATEFUL_DOMAINS=$DOMAIN,$BASE_DOMAIN|g" .env
    sed -i "s|DB_PASSWORD=.*|DB_PASSWORD=$DB_PASSWORD|g" .env
    
    print_success ".env file created and configured"
else
    print_info ".env sudah ada, skip..."
fi

echo ""
echo "📦 Step 4: Setup Database"
echo "========================="

# Buat database dan user
print_info "Membuat database dan user..."
mysql -u root <<EOF
CREATE DATABASE IF NOT EXISTS portfolio_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER IF NOT EXISTS 'portfolio_user'@'localhost' IDENTIFIED BY '$DB_PASSWORD';
GRANT ALL PRIVILEGES ON portfolio_db.* TO 'portfolio_user'@'localhost';
FLUSH PRIVILEGES;
EOF

if [ $? -eq 0 ]; then
    print_success "Database created"
else
    print_error "Failed to create database"
    exit 1
fi

# Run migrations
print_info "Running migrations..."
php artisan migrate --force
if [ $? -eq 0 ]; then
    print_success "Migrations completed"
else
    print_error "Failed to run migrations"
    exit 1
fi

# Run seeders
print_info "Seeding database..."
php artisan db:seed --force
if [ $? -eq 0 ]; then
    print_success "Database seeded"
else
    print_error "Failed to seed database"
fi

echo ""
echo "📦 Step 5: Setup Storage & Permissions"
echo "======================================"

# Storage link
print_info "Creating storage link..."
php artisan storage:link
print_success "Storage link created"

# Set permissions
print_info "Setting permissions..."
chown -R www-data:www-data storage bootstrap/cache public/storage
chmod -R 775 storage bootstrap/cache public/storage
print_success "Permissions set"

echo ""
echo "📦 Step 6: Optimize Application"
echo "================================"

print_info "Optimizing application..."
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
print_success "Application optimized"

echo ""
echo "📦 Step 7: Create Admin User"
echo "============================"

print_info "Creating admin user..."
php artisan tinker --execute="
\$user = \App\Models\User::updateOrCreate(
    ['email' => '$ADMIN_EMAIL'],
    [
        'name' => 'Admin',
        'email' => '$ADMIN_EMAIL',
        'password' => bcrypt('$ADMIN_PASSWORD'),
        'email_verified_at' => now()
    ]
);
echo 'Admin user created: ' . \$user->email;
"
print_success "Admin user ready"

echo ""
echo "📦 Step 8: Setup Systemd Service"
echo "================================="

print_info "Creating systemd service..."
cat > /etc/systemd/system/laravel-portfolio.service <<EOF
[Unit]
Description=Laravel Portfolio Application
After=network.target

[Service]
Type=simple
User=root
WorkingDirectory=$(pwd)
ExecStart=/usr/bin/php artisan serve --host=0.0.0.0 --port=8000
Restart=always
RestartSec=3

[Install]
WantedBy=multi-user.target
EOF

systemctl daemon-reload
systemctl enable laravel-portfolio
systemctl start laravel-portfolio

if [ $? -eq 0 ]; then
    print_success "Systemd service created and started"
else
    print_error "Failed to start service"
fi

echo ""
echo "=================================================="
echo "✅ INSTALASI SELESAI!"
echo "=================================================="
echo ""
print_success "Konfigurasi:"
echo "   🌐 URL: https://$DOMAIN"
echo "   📱 Admin Panel: https://$DOMAIN/admin"
echo "   📧 Admin Email: $ADMIN_EMAIL"
echo "   🔑 Admin Password: $ADMIN_PASSWORD"
echo ""
print_success "Database:"
echo "   📊 Database: portfolio_db"
echo "   👤 User: portfolio_user"
echo "   🔐 Password: $DB_PASSWORD"
echo ""
print_success "Service Management:"
echo "   ▶️  Start:   sudo systemctl start laravel-portfolio"
echo "   ⏸️  Stop:    sudo systemctl stop laravel-portfolio"
echo "   🔄 Restart: sudo systemctl restart laravel-portfolio"
echo "   📊 Status:  sudo systemctl status laravel-portfolio"
echo ""
print_info "⚠️  SIMPAN INFORMASI DI ATAS!"
echo ""
print_success "Aplikasi sudah jalan di: https://$DOMAIN"
print_success "Login admin di: https://$DOMAIN/admin"
echo ""
echo "🎉 Selamat menggunakan!"
echo ""
