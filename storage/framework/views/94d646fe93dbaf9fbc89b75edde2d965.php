<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo e($settings['site_name'] ?? 'Fauzan.dev'); ?> — Full-Stack Developer & UI Designer. I build beautiful, dynamic web applications. Available for freelance and full-time opportunities.">
    <title><?php echo e($settings['site_name'] ?? 'Fauzan.dev'); ?> — Full-Stack Developer & UI Designer</title>

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="font-sans antialiased bg-[#F8F9FA] text-[#111827] overflow-x-hidden" 
      x-data="{ 
        lang: localStorage.getItem('language') || 'id',
        toggleLang() {
          this.lang = this.lang === 'id' ? 'en' : 'id';
          localStorage.setItem('language', this.lang);
        }
      }">

    
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    
    <?php echo $__env->make('partials.footer', ['settings' => $settings], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

</body>
</html>
<?php /**PATH C:\Users\fauzan supriyadi\OneDrive\Dokumen\myporto\resources\views/layouts/app.blade.php ENDPATH**/ ?>