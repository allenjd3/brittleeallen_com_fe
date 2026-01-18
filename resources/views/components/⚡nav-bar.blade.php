<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<nav class="flex px-8 h-16 items-center justify-between border-b border-gray-200">
    <h2 class="text-3xl font-serif">Britt Lee Allen</h2>
    <div class="flex items-center gap-8">
        <a href="/" wire:navigate>Home</a>
        <a href="/blogs" wire:navigate.hover>Blogs</a>
    </div>
</nav>