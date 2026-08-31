# 🚀 Deployment Guide - Laravel Portfolio to Linux Server

## Prerequisites

Server Requirements:
- Ubuntu 20.04 / 22.04 LTS (recommended)
- PHP 8.2 or higher
- MySQL 8.0 or MariaDB 10.3+
- Nginx or Apache
- Composer
- Node.js & NPM (for assets)
- Git

---

## 📋 Step 1: Server Preparation

### Update System
```bash
sudo apt update && sudo apt upgrade -y
```

### Install PHP 8.2 and Extensions
```bash
sudo apt install -y software-properties-common
sudo add-apt-repository ppa:ondrej/php -y
sudo apt update

sudo apt install -y php8.2 php8.2-fpm php8.2-cli php8.2-common php8.2-mysql \
php8.2-zip php8.2-gd php8.2-mbstring php8.2-curl php8.2-xml php8.2-bcmath \
php8.2-intl php8.2-soap php8.2-imagick
```

### Install MySQL
```bash
sudo apt install -y mysql-server
sudo mysql_secure_installation
```

Create database:
```bash
sudo mysql -u root -p
```

```sql
CREATE DATABASE portfolio_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'portfolio_user'@'localhost' IDENTIFIED BY 'your_strong_password';
GRANT ALL PRIVILEGES ON portfolio_db.* TO 'portfolio_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

### Install Composer
```bash
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
sudo chmod +x /usr/local/bin/composer
```

### Install Node.js & NPM
```bash
curl -fsSL https://deb.nodesource.com/setup_20.x | sudo -E bash -
sudo apt install -y nodejs
```

### Install Nginx
```bash
sudo apt install -y nginx
```

---

## 📂 Step 2: Clone & Setup Project

### Clone Repository
```bash
cd /var/www
sudo git clone https://github.com/fauzansupriyadi1-stack/myserver-portofolio.git portfolio
sudo chown -R $USER:$USER /var/www/portfolio
cd portfolio
```

### Install Dependencies
```bash
# Install PHP dependencies
composer install --optimize-autoloader --no-dev

# Install Node dependencies
npm install

# Build assets
npm run build
```

### Setup Environment
```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### Configure .env File
```bash
nano .env
```

Update these values:
```env
APP_NAME="Portfolio Fauzan"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio_db
DB_USERNAME=portfolio_user
DB_PASSWORD=your_strong_password

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```

### Setup Storage & Permissions
```bash
# Create storage link
php artisan storage:link

# Set permissions
sudo chown -R www-data:www-data /var/www/portfolio/storage
sudo chown -R www-data:www-data /var/www/portfolio/bootstrap/cache
sudo chmod -R 775 /var/www/portfolio/storage
sudo chmod -R 775 /var/www/portfolio/bootstrap/cache
```

### Run Migrations & Seeders
```bash
php artisan migrate --force
php artisan db:seed --force
```

### Optimize Application
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

---

## 🌐 Step 3: Configure Nginx

### Create Nginx Configuration
```bash
sudo nano /etc/nginx/sites-available/portfolio
```

Paste this configuration:
```nginx
server {
    listen 80;
    listen [::]:80;
    server_name yourdomain.com www.yourdomain.com;
    root /var/www/portfolio/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
        fastcgi_hide_header X-Powered-By;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }

    # Cache static assets
    location ~* \.(jpg|jpeg|png|gif|ico|css|js|svg|woff|woff2|ttf|eot)$ {
        expires 1y;
        add_header Cache-Control "public, immutable";
    }

    # Gzip compression
    gzip on;
    gzip_vary on;
    gzip_min_length 1024;
    gzip_types text/plain text/css text/xml text/javascript application/x-javascript application/javascript application/xml+rss application/json image/svg+xml;
}
```

### Enable Site
```bash
# Enable site
sudo ln -s /etc/nginx/sites-available/portfolio /etc/nginx/sites-enabled/

# Remove default site
sudo rm /etc/nginx/sites-enabled/default

# Test configuration
sudo nginx -t

# Restart Nginx
sudo systemctl restart nginx
```

---

## 🔒 Step 4: SSL Certificate (Let's Encrypt)

### Install Certbot
```bash
sudo apt install -y certbot python3-certbot-nginx
```

### Get SSL Certificate
```bash
sudo certbot --nginx -d yourdomain.com -d www.yourdomain.com
```

Follow the prompts:
- Enter email address
- Agree to terms
- Choose option 2 (Redirect HTTP to HTTPS)

### Auto-renewal Test
```bash
sudo certbot renew --dry-run
```

---

## 🔧 Step 5: Additional Configuration

### Setup Firewall
```bash
sudo ufw allow 'Nginx Full'
sudo ufw allow OpenSSH
sudo ufw enable
```

### Setup Cron Jobs (for Laravel Scheduler)
```bash
sudo crontab -e -u www-data
```

Add this line:
```
* * * * * cd /var/www/portfolio && php artisan schedule:run >> /dev/null 2>&1
```

### Setup Supervisor (for Queue Workers - Optional)
```bash
sudo apt install -y supervisor

sudo nano /etc/supervisor/conf.d/portfolio-worker.conf
```

Add:
```ini
[program:portfolio-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /var/www/portfolio/artisan queue:work --sleep=3 --tries=3 --max-time=3600
autostart=true
autorestart=true
stopasgroup=true
killasgroup=true
user=www-data
numprocs=1
redirect_stderr=true
stdout_logfile=/var/www/portfolio/storage/logs/worker.log
stopwaitsecs=3600
```

```bash
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start portfolio-worker:*
```

---

## 📊 Step 6: Monitoring & Maintenance

### Check Logs
```bash
# Application logs
tail -f /var/www/portfolio/storage/logs/laravel.log

# Nginx logs
tail -f /var/log/nginx/error.log
tail -f /var/log/nginx/access.log

# PHP-FPM logs
tail -f /var/log/php8.2-fpm.log
```

### Clear Cache (if needed)
```bash
cd /var/www/portfolio
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Update Application
```bash
cd /var/www/portfolio
git pull origin main
composer install --optimize-autoloader --no-dev
npm install && npm run build
php artisan migrate --force
php artisan optimize
sudo systemctl reload php8.2-fpm
sudo systemctl reload nginx
```

---

## 🎨 Step 7: Upload Images

### Upload via SCP (from local to server)
```bash
# From your local machine
scp public/storage/skills_bg.jpg user@your-server-ip:/var/www/portfolio/public/storage/
scp public/storage/certifications_bg.jpg user@your-server-ip:/var/www/portfolio/public/storage/
```

Or use SFTP client like FileZilla/WinSCP to upload files to:
```
/var/www/portfolio/public/storage/
```

After upload, fix permissions:
```bash
sudo chown www-data:www-data /var/www/portfolio/public/storage/*.jpg
sudo chmod 644 /var/www/portfolio/public/storage/*.jpg
```

---

## ☁️ Step 8: Cloudflare Tunnel Configuration (Optional)

If you're using Cloudflare Tunnel to expose your local server to the internet, follow these steps:

### Setup Cloudflare Tunnel

1. **Install Cloudflare Tunnel (cloudflared)**:
```bash
# Download cloudflared
wget https://github.com/cloudflare/cloudflared/releases/latest/download/cloudflared-linux-arm64.deb
sudo dpkg -i cloudflared-linux-arm64.deb
```

2. **Authenticate with Cloudflare**:
```bash
cloudflared tunnel login
```

3. **Create a Tunnel**:
```bash
cloudflared tunnel create portfolio
```

4. **Configure the Tunnel**:
```bash
nano ~/.cloudflared/config.yml
```

Add:
```yaml
tunnel: <TUNNEL-ID>
credentials-file: /root/.cloudflared/<TUNNEL-ID>.json

ingress:
  - hostname: yourdomain.com
    service: http://localhost:8000
  - service: http_status:404
```

5. **Route DNS**:
```bash
cloudflared tunnel route dns portfolio yourdomain.com
```

6. **Run Tunnel as Service**:
```bash
sudo cloudflared service install
sudo systemctl start cloudflared
sudo systemctl enable cloudflared
```

### Configure Laravel for Cloudflare Tunnel

1. **Copy Cloudflare environment template**:
```bash
cd /var/www/portfolio
cp .env.cloudflare.example .env.cloudflare
nano .env.cloudflare
```

2. **Update these values** (replace `yourdomain.com` with your actual domain):
```env
APP_URL=https://yourdomain.com
ASSET_URL=https://yourdomain.com
SESSION_DOMAIN=.yourdomain.com
SESSION_SECURE_COOKIE=true
SANCTUM_STATEFUL_DOMAINS=yourdomain.com
```

3. **Merge with your .env**:
```bash
# Backup current .env
cp .env .env.backup

# Update specific values or manually copy from .env.cloudflare
nano .env
```

4. **Clear cache**:
```bash
php artisan config:clear
php artisan cache:clear
php artisan optimize
```

### Important Notes for Cloudflare Tunnel:

- ✅ `TrustProxies.php` is already configured to trust all proxies
- ✅ All X-Forwarded headers are properly handled
- ✅ HTTPS is enforced for secure cookies
- ⚠️ Make sure `SESSION_DOMAIN` starts with a dot (`.yourdomain.com`)
- ⚠️ Make sure `SESSION_SECURE_COOKIE=true` for HTTPS
- ⚠️ After any `.env` changes, always run `php artisan config:clear`

### Verify Cloudflare Tunnel is Working:

```bash
# Check tunnel status
sudo systemctl status cloudflared

# Check tunnel logs
sudo journalctl -u cloudflared -f
```

Access your site at: `https://yourdomain.com`

---

## 🔐 Security Best Practices

1. **Disable PHP Functions** (in php.ini):
```ini
disable_functions = exec,passthru,shell_exec,system,proc_open,popen
```

2. **Hide PHP Version**:
```ini
expose_php = Off
```

3. **Set Up Fail2Ban**:
```bash
sudo apt install -y fail2ban
sudo systemctl enable fail2ban
sudo systemctl start fail2ban
```

4. **Regular Backups**:
```bash
# Database backup
sudo mysqldump -u portfolio_user -p portfolio_db > backup_$(date +%Y%m%d).sql

# Files backup
sudo tar -czf portfolio_backup_$(date +%Y%m%d).tar.gz /var/www/portfolio
```

---

## 🚨 Troubleshooting

### 500 Internal Server Error
```bash
# Check logs
tail -f storage/logs/laravel.log

# Clear and rebuild cache
php artisan cache:clear
php artisan config:clear
php artisan optimize
```

### Permission Issues
```bash
sudo chown -R www-data:www-data /var/www/portfolio
sudo chmod -R 775 storage bootstrap/cache
```

### Database Connection Error
```bash
# Test MySQL connection
mysql -u portfolio_user -p portfolio_db

# Check .env file
cat .env | grep DB_
```

### White Screen
```bash
# Enable debug temporarily
nano .env
# Set APP_DEBUG=true
# Check error, then set back to false
```

---

## 📞 Access Filament Admin

After setup, access admin panel at:
```
https://yourdomain.com/admin
```

**Default Login** (from seeder):
- Email: `admin@example.com`
- Password: `password`

**⚠️ IMPORTANT:** Change admin password immediately after first login!

---

## 🎉 Done!

Your portfolio is now live at:
- **Frontend:** https://yourdomain.com
- **Admin Panel:** https://yourdomain.com/admin

---

## 📚 Additional Resources

- [Laravel Deployment Documentation](https://laravel.com/docs/10.x/deployment)
- [Filament Documentation](https://filamentphp.com/docs)
- [Nginx Documentation](https://nginx.org/en/docs/)
- [Let's Encrypt Documentation](https://letsencrypt.org/docs/)

---

**Need Help?** Check logs first:
```bash
tail -f /var/www/portfolio/storage/logs/laravel.log
```
