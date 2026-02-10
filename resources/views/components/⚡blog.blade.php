<?php

use App\DTO\Post;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Locked;

new class extends Component
{
    #[Locked]
    public string $uri;

    public function mount(string $uri) {
        $this->uri = $uri;
    }

    #[Computed]
    public function post() {
        $response = Http::asJson()->post(config('app.api_endpoint'), [
            'query' => File::get(resource_path('graphql/getPost.graphql')),
            'variables' => [
                'uri' => $this->uri,
            ]
        ]);

        if (!$response->json('data.nodeByUri')) {
            abort(404);
        }

        return new Post($response->json('data.nodeByUri'));
    }

    #[On('added-comment')]
    public function updatePost()
    {
        unset($this->post);
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