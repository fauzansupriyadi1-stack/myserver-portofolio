
<section id="faq" class="py-24 px-4 sm:px-6 lg:px-8 bg-white">
    <div class="max-w-7xl mx-auto">

        
        <div class="text-center mb-14">
            <h2 class="text-3xl lg:text-5xl font-black text-[#111827] mb-4">
                <span x-show="lang === 'id'">Pertanyaan yang Sering Diajukan</span>
                <span x-show="lang === 'en'" x-cloak>Frequently Asked Questions</span>
            </h2>
            <p class="text-[#4B5563] max-w-xl mx-auto">
                <span x-show="lang === 'id'">Semua yang perlu Anda ketahui tentang bekerja dengan saya — layanan, proses, timeline, dan cara memulai.</span>
                <span x-show="lang === 'en'" x-cloak>Everything you need to know about working with me — services, process, timeline, and how to get started.</span>
            </p>
        </div>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($faqs->count() > 0): ?>
        <div x-data="{ open: null }" class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <div class="border border-gray-100 rounded-2xl overflow-hidden hover:border-[#A3E635]/50 transition-colors duration-300"
                 :class="open === <?php echo e($faq->id); ?> ? 'border-[#A3E635]/50 shadow-sm shadow-[#A3E635]/10' : ''">
                <button @click="open = open === <?php echo e($faq->id); ?> ? null : <?php echo e($faq->id); ?>"
                        id="faq-toggle-<?php echo e($faq->id); ?>"
                        class="w-full flex items-center justify-between p-6 text-left hover:bg-gray-50/50 transition-colors duration-200">
                    <span class="font-semibold text-[#111827] text-sm pr-4 leading-tight"><?php echo e($faq->question); ?></span>
                    <div class="shrink-0 w-8 h-8 rounded-full flex items-center justify-center transition-all duration-300"
                         :class="open === <?php echo e($faq->id); ?> ? 'bg-[#A3E635] rotate-45' : 'bg-gray-100'">
                        <svg class="w-4 h-4 transition-colors duration-300"
                             :class="open === <?php echo e($faq->id); ?> ? 'text-[#1E3A2B]' : 'text-[#4B5563]'"
                             fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                </button>

                <div x-show="open === <?php echo e($faq->id); ?>"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 -translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 translate-y-0"
                     x-transition:leave-end="opacity-0 -translate-y-2"
                     class="px-6 pb-6">
                    <div class="w-full h-px bg-gradient-to-r from-[#A3E635]/30 via-gray-200 to-transparent mb-4"></div>
                    <p class="text-[#4B5563] text-sm leading-relaxed"><?php echo e($faq->answer); ?></p>
                </div>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
        </div>
        <?php else: ?>
        <div class="text-center text-[#4B5563] py-12">
            <p>No FAQs available yet. Check back soon!</p>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    </div>
</section>

<?php /**PATH C:\Users\fauzan supriyadi\OneDrive\Dokumen\myporto\resources\views/partials/faq.blade.php ENDPATH**/ ?>