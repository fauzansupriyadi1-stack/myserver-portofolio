# ☁️ Cloudflare Tunnel Setup Guide

## Quick Setup untuk Cloudflare Tunnel

### 🎯 Masalah yang Dipecahkan:
- ✅ Login tidak berfungsi saat akses via domain Cloudflare
- ✅ Session/Cookie issues dengan proxy
- ✅ HTTPS redirect dan secure cookie handling

---

## 📋 Langkah Setup di Server

### 1. Copy Template Environment

```bash
cd /var/www/myserver-portofolio
cp .env.cloudflare.example .env.temp
```

### 2. Edit Konfigurasi

```bash
nano .env.temp
```

**Ganti semua `yourdomain.com` dengan domain Cloudflare Tunnel kamu:**

```env
APP_URL=https://your-actual-domain.com
ASSET_URL=https://your-actual-domain.com
SESSION_DOMAIN=.your-actual-domain.com
SANCTUM_STATEFUL_DOMAINS=your-actual-domain.com
```

### 3. Merge dengan .env yang Ada

```bash
# Backup .env lama
cp .env .env.backup

# Copy pengaturan penting dari .env.temp ke .env
# JANGAN ganti APP_KEY yang sudah ada!
nano .env
```

**Update baris-baris ini di .env:**
```env
APP_URL=https://your-actual-domain.com
ASSET_URL=https://your-actual-domain.com
SESSION_DOMAIN=.your-actual-domain.com
SESSION_SECURE_COOKIE=true
SESSION_SAME_SITE=lax
SANCTUM_STATEFUL_DOMAINS=your-actual-domain.com
```

### 4. Clear Cache

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan optimize
```

### 5. Restart Laravel Serve

```bash
# Attach ke screen
screen -r laravel

# Ctrl+C untuk stop

# Start lagi
php artisan serve --host=0.0.0.0 --port=8000

# Ctrl+A lalu D untuk detach
```

---

## 🔍 Troubleshooting

### Login Masih Gagal?

**1. Cek .env sudah benar:**
```bash
cat .env | grep -E "APP_URL|SESSION_DOMAIN|SESSION_SECURE"
```

Harus menunjukkan domain yang benar dengan HTTPS.

**2. Cek TrustProxies sudah ter-update:**
```bash
cat app/Http/Middleware/TrustProxies.php | grep "protected \$proxies"
```

Harus menunjukkan: `protected $proxies = '*';`

**3. Clear semua cache:**
```bash
php artisan optimize:clear
```

**4. Cek Cloudflare Tunnel aktif:**
```bash
sudo systemctl status cloudflared
```

**5. Test dengan browser incognito/private:**
- Kadang cookie lama bikin masalah
- Coba login di incognito mode

### Debug Mode (Sementara)

Aktifkan debug untuk lihat error detail:

```bash
nano .env
```

```env
APP_DEBUG=true
LOG_LEVEL=debug
```

```bash
php artisan config:clear
```

Coba login lagi, lalu cek log:

```bash
tail -f storage/logs/laravel.log
```

**PENTING:** Setelah debug, matikan lagi:
```env
APP_DEBUG=false
LOG_LEVEL=error
```

---

## ✅ Checklist Konfigurasi Benar

- [ ] `APP_URL` pakai HTTPS dan domain yang benar
- [ ] `ASSET_URL` sama dengan APP_URL
- [ ] `SESSION_DOMAIN` pakai titik di depan: `.yourdomain.com`
- [ ] `SESSION_SECURE_COOKIE=true`
- [ ] `SESSION_SAME_SITE=lax`
- [ ] `TrustProxies.php` sudah di-update (`$proxies = '*'`)
- [ ] Cache sudah di-clear
- [ ] Laravel serve sudah di-restart
- [ ] Cloudflare Tunnel running
- [ ] Test login berhasil dari domain Cloudflare

---

## 🎉 Selesai!

Setelah semua langkah di atas, login via domain Cloudflare harusnya sudah berfungsi normal.

### Test Login:
- **URL:** `https://yourdomain.com/admin`
- **Email:** `fauzansupriyadi1@gmail.com`
- **Password:** `343422`

---

## 📞 Need Help?

Kalau masih ada masalah:
1. Cek log: `tail -f storage/logs/laravel.log`
2. Cek browser console (F12)
3. Cek Cloudflare Tunnel log: `sudo journalctl -u cloudflared -f`
