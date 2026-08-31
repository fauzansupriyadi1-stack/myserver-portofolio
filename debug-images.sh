#!/bin/bash

# ===================================================================
# DEBUG IMAGES - Check why project images not showing
# ===================================================================

echo "🔍 Debug Project Images"
echo "======================="
echo ""

cd /var/www/myserver-portofolio

echo "📊 Step 1: Check Storage Link"
echo "=============================="
ls -la public/storage
echo ""

if [ ! -L public/storage ]; then
    echo "❌ Storage link does not exist!"
    echo "Creating storage link..."
    php artisan storage:link
    echo ""
fi

echo "📊 Step 2: Check Project Images in Database"
echo "============================================"
php artisan tinker --execute="
\$projects = \App\Models\Project::all();
echo 'Total projects: ' . \$projects->count() . PHP_EOL;
echo PHP_EOL;
foreach(\$projects as \$p) {
    echo 'Project: ' . \$p->title . PHP_EOL;
    echo 'Image Path: ' . (\$p->image_path ?? 'NULL') . PHP_EOL;
    echo 'Image URL: ' . (\$p->image_url ?? 'NULL') . PHP_EOL;
    if(\$p->image_path) {
        \$fullPath = storage_path('app/public/' . \$p->image_path);
        echo 'File exists: ' . (file_exists(\$fullPath) ? 'YES' : 'NO') . PHP_EOL;
        if(file_exists(\$fullPath)) {
            echo 'File size: ' . filesize(\$fullPath) . ' bytes' . PHP_EOL;
        }
    }
    echo '---' . PHP_EOL;
}
"

echo ""
echo "📊 Step 3: Check Actual Files"
echo "=============================="
echo "Files in storage/app/public/projects:"
ls -lh storage/app/public/projects/ 2>/dev/null || echo "Directory not found"
echo ""
echo "Files in public/storage/projects:"
ls -lh public/storage/projects/ 2>/dev/null || echo "Directory not found"

echo ""
echo "📊 Step 4: Fix Permissions"
echo "=========================="
chown -R www-data:www-data storage/app/public
chmod -R 755 storage/app/public
chown -R www-data:www-data public/storage
chmod -R 755 public/storage
echo "✅ Permissions fixed"

echo ""
echo "=================================================="
echo "✅ DEBUG COMPLETED!"
echo "=================================================="
echo ""
echo "💡 Next steps:"
echo "   1. Check output above for NULL image_path"
echo "   2. If image_path is NULL, re-upload from admin panel"
echo "   3. If file doesn't exist, re-upload"
echo "   4. If file exists but not showing, check browser console (F12)"
echo ""
