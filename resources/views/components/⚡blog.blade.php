<?php

use App\DTO\Post;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Locked;
use Illuminate\Support\Uri;

new class extends Component
{
    #[Locked]
    public string $uri;
    public ?string $title = null;
    public array $rawPost;

    public function mount(string $uri) {
        $this->uri = $uri;

        $response = Http::asJson()->post(config('app.api_endpoint'), [
            'query' => File::get(resource_path('graphql/getPost.graphql')),
            'variables' => [
                'uri' => $this->uri,
            ]
        ]);

        if (!$response->json('data.nodeByUri')) {
            abort(404);
        }

        $this->rawPost = $response->json('data.nodeByUri');
        $this->title = data_get($this->rawPost, 'title');
    }

    #[Computed]
    public function post() {
        return new Post($this->rawPost);
    }

    #[On('added-comment')]
    public function updatePost()
    {
        unset($this->post);
    }

    public function render()
    {
        return $this->view()
            ->layout('layouts.app', [
                'title' => $this->title . ' | Brittany Lee Allen',
                'description' => data_get($this->rawPost, 'excerpt'),
                'url' => $this->post->uri,
                'image' => $this->post->featuredImage->getUrl('large'),
            ]);
    }
};
?>

<div>
    <div class="max-w-5xl mb-32  mx-auto px-4">
        <img class="w-full max-w-3xl mx-auto" src="{{ $this->post->featuredImage->getUrl('large') }}" alt="{{ $this->post->featuredImage->altText }}" />
        <h2 id="content" class="text-3xl mt-16 mb-4 scroll-mt-32">{{ $this->post->title }}</h2>
        <p class="mb-4">{{ $this->post->date->format('F d, Y') }}</p>
        <div class="prose-lg mx-auto">
            {!! $this->post->body !!}
        </div>
        <div class="mt-8">
            <div class="flex gap-2">
                <a class="text-green-very-dark"
                    href="{{ Uri::of('https://www.facebook.com/sharer/sharer.php')->withQuery(['u' => route('post.uri', ['uri' => $this->post->uri])]) }}"
                    target="_blank"
                    rel="noopener"
                    aria-label="Share on Facebook">

                    <svg class="size-8" viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
                        <path d="M22 12a10 10 0 1 0-11.5 9.9v-7h-2.3V12h2.3V9.8c0-2.3 1.4-3.6 3.5-3.6 1 0 2 .2 2 .2v2.2h-1.1c-1.1 0-1.4.7-1.4 1.3V12h2.4l-.4 2.9h-2v7A10 10 0 0 0 22 12z"/>
                    </svg>
                </a>

                <a class="text-green-very-dark"
                    href="https://www.instagram.com/brittanyleeallen/"
                    target="_blank"
                    rel="noopener"
                    aria-label="Visit Instagram">

                    <svg class="size-8" viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
                        <path d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7zm5 5.5A4.5 4.5 0 1 1 7.5 12 4.5 4.5 0 0 1 12 7.5zm0 7.3A2.8 2.8 0 1 0 9.2 12 2.8 2.8 0 0 0 12 14.8zM17.8 6.2a1 1 0 1 1-1-1 1 1 0 0 1 1 1z"/>
                    </svg>
                </a>

                <a class="text-green-very-dark"
                    href="{{ Uri::of('https://www.threads.net/intent/post')->withQuery(['text' => 'Check this out: ' . route('post.uri', ['uri' => $this->post->uri])]) }}"
                    target="_blank"
                    rel="noopener"
                    aria-label="Share on Threads">

                    <svg class="size-8" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-threads" viewBox="0 0 16 16">
                        <path d="M6.321 6.016c-.27-.18-1.166-.802-1.166-.802.756-1.081 1.753-1.502 3.132-1.502.975 0 1.803.327 2.394.948s.928 1.509 1.005 2.644q.492.207.905.484c1.109.745 1.719 1.86 1.719 3.137 0 2.716-2.226 5.075-6.256 5.075C4.594 16 1 13.987 1 7.994 1 2.034 4.482 0 8.044 0 9.69 0 13.55.243 15 5.036l-1.36.353C12.516 1.974 10.163 1.43 8.006 1.43c-3.565 0-5.582 2.171-5.582 6.79 0 4.143 2.254 6.343 5.63 6.343 2.777 0 4.847-1.443 4.847-3.556 0-1.438-1.208-2.127-1.27-2.127-.236 1.234-.868 3.31-3.644 3.31-1.618 0-3.013-1.118-3.013-2.582 0-2.09 1.984-2.847 3.55-2.847.586 0 1.294.04 1.663.114 0-.637-.54-1.728-1.9-1.728-1.25 0-1.566.405-1.967.868ZM8.716 8.19c-2.04 0-2.304.87-2.304 1.416 0 .878 1.043 1.168 1.6 1.168 1.02 0 2.067-.282 2.232-2.423a6.2 6.2 0 0 0-1.528-.161"/>
                    </svg>
                </a>
            </div>
        </div>

        <div class="w-full mx-auto">
            <h3 class="text-3xl mt-16 mb-8 font-bold">Comments</h3>
            <livewire:comment-form :postId="$this->post->id" />
            <div>
                @foreach($this->post->comments as $comment)
                    <x-comment :$comment :postId="$this->post->id" />
                @endforeach
            </div>
        </div>
    </div>
</div>