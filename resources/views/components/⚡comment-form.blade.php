<?php

use Livewire\Attributes\Validate;
use Livewire\Attributes\Locked;
use Livewire\Component;
use RyanChandler\LaravelCloudflareTurnstile\Rules\Turnstile;

new class extends Component
{
    #[Locked]
    public int $postId;

    #[Locked]
    public int $parentId;

    #[Validate('required')]
    public string $name;

    #[Validate('required')]
    public string $email;

    #[Validate('required')]
    public string $content;

    #[Validate('required')]
    #[Validate(new Turnstile)]
    public $captcha;

    public bool $isNested = false;
    public bool $collapsed = true;
    public bool $shouldShowReply = false;

    public bool $isSuccessful;
    public string $message = "";

    public function mount($postId, $parentId = 0, $isNested = false)
    {
        $this->postId = $postId;
        $this->parentId = $parentId;
        $this->isNested = $isNested;
    }

    public function save()
    {
        $this->validate();

        $response = Http::asJson()->post(config('app.api_endpoint'), [
            'query' => File::get(resource_path('graphql/createComment.graphql')),
            'variables' => [
                'input' => [
                    'commentOn' => $this->postId,
                    'content' => $this->content,
                    'parent' => $this->parentId,
                    'author' => $this->name,
                    'authorEmail' => $this->email,
                    'authorUrl' => '',
                ],
            ]
        ]);

        if (! $response->ok() || $response->json('errors')) {
            $this->failureMessage('There was a problem creating the comment. Try again later.');
            return;
        }

        $this->name = "";
        $this->email = "";
        $this->content = "";
        if ($this->isNested) {
            $this->collapsed = true;
        }

        $this->successMessage('Your comment was successfully received!');
        $this->dispatch('added-comment');
    }

    public function successMessage(string $message)
    {
        $this->message = $message;
        $this->isSuccessful = true;

        $this->dispatch('flash-message');
    }

    public function failureMessage(string $message)
    {
        $this->message = $message;
        $this->isSuccessful = false;

        $this->dispatch('flash-message');
    }

    public function toggleCollapsed()
    {
        $this->collapsed = ! $this->collapsed;
    }
};
?>

<div>
    @pushOnce('scripts')
        <x-turnstile.scripts />
    @endPushOnce

    @if ($isNested && $collapsed && $shouldShowReply)
        <button wire:click="toggleCollapsed" class="text-sm text-green-base hover:text-green-very-dark font-medium">
            Reply
        </button>
    @endif
    @if (! $isNested || ! $collapsed)
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
            {{ $message }}
        </div>
        <form wire:submit="save" class="mx-auto space-y-6 p-6 bg-white rounded-lg">
            <h3 class="text-2xl font-bold text-gray-900 mb-6">Leave a {{ $isNested ? 'Reply' : 'Comment' }}</h3>

            <flux:field>
                <flux:label class="gap-1">Name <span class="text-red-500">*</span></flux:label>
                <flux:input wire:model="name" required placeholder="Your Name" />
                <flux:error name="name" />
            </flux:field>

            <flux:field>
                <flux:label class="gap-1">Email <span class="text-red-500">*</span></flux:label>
                <flux:input wire:model="email" type="email" placeholder="your@email.com" required />
                <flux:error name="email" />
            </flux:field>

            <flux:field>
                <flux:label class="gap-1">Comment <span class="text-red-500">*</span></flux:label>
                <flux:textarea wire:model="content" placeholder="Your Comment Here" required />
                <flux:error name="content" />
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
                    <span wire:loading.remove>Submit Comment</span>
                    <span wire:loading>Submitting…</span>
                </button>
            </div>
        </form>
    @endif
</div>