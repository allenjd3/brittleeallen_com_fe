<nav class="sticky top-0 bg-white flex px-4 h-16 items-center justify-between border-b border-gray-200">
    <h2 class="text-2xl font-serif"><a href="/" wire:navigate.hover>Britt Lee Allen</a></h2>

    <flux:modal.trigger class="sm:hidden" name="mobile-nav">
        <flux:button>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </flux:button>
    </flux:modal.trigger>

    <div class="hidden sm:flex items-center gap-8">
        <a href="/blogs" wire:navigate.hover>Blog</a>
        <a href="/podcast">Podcast</a>
        <a href="/newsletter" class="bg-black rounded-full py-2 px-4 text-white">Newsletter</a>
    </div>
</nav>

<flux:modal name="mobile-nav" flyout>
    <div class="space-y-2 w-64">
        <a href="/blogs" wire:navigate class="block p-2 hover:bg-zinc-800/5 rounded">Blog</a>
        <a href="/podcast" class="block p-2 hover:bg-zinc-800/5 rounded">Podcast</a>
        <a href="/newsletter" class="block p-2 bg-black text-white rounded">Newsletter</a>
    </div>
</flux:modal>