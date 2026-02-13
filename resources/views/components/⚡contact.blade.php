<?php

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;
use RyanChandler\LaravelCloudflareTurnstile\Rules\Turnstile;

new class extends Component
{
    #[Validate('required')]
    public string $name;

    #[Validate('required')]
    public string $email;

    #[Validate('required')]
    public string $message;

    #[Validate('required')]
    #[Validate(new Turnstile)]
    public $captcha;

    public bool $isSuccessful;
    public string $flashMessage;

    public function save()
    {
        $this->validate();

        Mail::to('britt.allen81713@yahoo.com')->send(new ContactUs(name: $this->name, email: $this->email, content: $this->message));

        $this->successMessage('Successfully sent! Thanks for contacting us.');
    }

    public function successMessage(string $message)
    {
        $this->flashMessage = $message;
        $this->isSuccessful = true;

        $this->message = "";
        $this->name = "";
        $this->email = "";

        $this->dispatch('flash-message');
    }
};
?>

<div class="bg-tan-light min-h-dvh">
    @pushOnce('scripts')
        <x-turnstile.scripts />
    @endPushOnce
    <div class="max-w-3xl mx-auto pt-32 px-8 pb-8">
        <div
            x-data="{ show: false }"
            x-show="show"
            x-transition
            @flash-message.window="
                show = true;
                setTimeout(() => show = false, 3000);
                $nextTick(() => $el.scrollIntoView({ behavior: 'smooth', block: 'nearest' }))
            "
            @class(['scroll-mt-16', 'text-green-500' => $isSuccessful, 'text-red-500' => ! $isSuccessful])
        >
            {{ $flashMessage }}
        </div>
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

            <flux:field>
                <x-turnstile wire:model="captcha" />
                <flux:error name="captcha" />
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