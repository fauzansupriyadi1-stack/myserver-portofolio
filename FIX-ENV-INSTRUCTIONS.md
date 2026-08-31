# 🔧 Fix .env untuk Cloudflare Tunnel

## 🎯 Yang Bermasalah:

Tombol login di **porto.fauzan.online** tidak berfungsi karena konfigurasi session salah.

## ✅ Solusi:

### Cara 1: Edit Manual via SFTP (RECOMMENDED)

1. **Buka VS Code Explorer** (Ctrl+Shift+E)

2. **Klik kanan pada folder root** → **SFTP: Download**

3. **Buka file `.env` di server** (lewat VS Code SFTP atau terminal)

4. **Cari dan ubah baris ini:**

   ```env
   # UBAH INI:
   SESSION_DOMAIN=.fauzan.online
   SESSION_SECURE_COOKIE=true
   
   # JADI INI:
   SESSION_DOMAIN=porto.fauzan.online
   SESSION_SECURE_COOKIE=false
   ```

5. **Save file** (Ctrl+S) - Otomatis upload ke server

6. **Di server, jalankan:**
   ```bash
   cd /var/www/myserver-portofolio
   php artisan config:clear
   php artisan optimize
   sudo systemctl restart laravel-portfolio
   ```

---

### Cara 2: Copy dari File Template

1. **Di VS Code, buka file:** `.env.server.fix`

2. **Via SFTP, download `.env` dari server** untuk ambil:
   - `APP_KEY` (jangan ganti!)
   - `DB_PASSWORD` (jangan ganti!)

3. **Copy 2 nilai di atas ke `.env.server.fix`**

4. **Rename `.env.server.fix` → `.env`**

5. **Upload ke server via SFTP** (Replace yang lama)

6. **Di server, restart:**
   ```bash
   sudo systemctl restart laravel-portfolio
   ```

---

## 🔍 Penjelasan Perubahan:

### ❌ Konfigurasi Lama (SALAH):
```env
SESSION_DOMAIN=.fauzan.online        # Dengan titik
SESSION_SECURE_COOKIE=true           # Force HTTPS
```

**Masalah:** 
- Cookie tidak ter-set karena mismatch domain
- `php artisan serve` tidak pakai HTTPS, jadi `SESSION_SECURE_COOKIE=true` bikin error

### ✅ Konfigurasi Baru (BENAR):
```env
SESSION_DOMAIN=porto.fauzan.online   # Tanpa titik, full domain
SESSION_SECURE_COOKIE=false          # Karena serve pakai HTTP
```

**Kenapa work:**
- Domain match persis
- Cookie bisa di-set karena tidak force HTTPS
- Cloudflare Tunnel handle HTTPS di layer atas

---

## 🚀 Setelah Fix:

Test login di: **https://porto.fauzan.online/admin**

- Email: `fauzansupriyadi1@gmail.com`
- Password: `343422`

Tombol **Masuk** sekarang harusnya work! ✅

---

## 📝 Catatan:

Kalau pakai **Nginx dengan SSL**, baru pakai:
```env
SESSION_SECURE_COOKIE=true
```

Tapi karena pakai `php artisan serve` (HTTP) + Cloudflare Tunnel, pakai `false`.

---

## 🆘 Kalau Masih Gagal:

1. Clear browser cookies untuk `porto.fauzan.online`
2. Coba incognito mode
3. Cek browser console (F12) untuk error
4. Pastikan service jalan: `sudo systemctl status laravel-portfolio`
