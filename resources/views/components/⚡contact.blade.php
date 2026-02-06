<?php

use Livewire\Component;
use Livewire\Attributes\Validate;

new class extends Component
{
    #[Validate('required')]
    public string $name;

    #[Validate('required')]
    public string $email;

    #[Validate('required')]
    public string $message;

    public function save()
    {
        $this->validate();

    }
};
?>

<div class="bg-tan-light min-h-dvh">
    <div class="max-w-3xl mx-auto pt-32">
        <h1 class="text-3xl font-bold mb-8">Contact Me</h1>
        <form wire:submit="save" class="flex flex-col gap-4">
            <flux:field>
                <flux:label>Name</flux:label>
                <flux:input wire:model="name" placeholder="Your Name" />
                <flux:error name="name" />
            </flux:field>
            <flux:field>
                <flux:label>Email</flux:label>
                <flux:input wire:model="email" placeholder="your@email.com" />
                <flux:error name="email" />
            </flux:field>
            <flux:field>
                <flux:label>Message</flux:label>
                <flux:textarea wire:model="message" placeholder="Your Message Here" />
                <flux:error name="message" />
            </flux:field>

            <div class="flex items-center justify-between">
                <p class="text-sm text-gray-500">
                    <span class="text-red-500">*</span> Required fields
                </p>
                <button
                    type="submit"
                    class="px-6 py-2 bg-gray-900 text-white font-medium rounded-lg hover:bg-black focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition"
                    wire:loading.attr="disabled"
                >
                    <span wire:loading.remove>Submit Message</span>
                    <span wire:loading>Submitting…</span>
                </button>
            </div>
        </form>
    </div>
</div>