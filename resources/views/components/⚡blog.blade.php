<?php

use App\DTO\Post;
use Livewire\Component;

new class extends Component
{
    private string $uri;

    public function mount(string $uri) {
        $this->uri = $uri;
        $this->post = $this->getBlog();
    }

    #[Computed]
    public function getBlog() {
        $response = Http::asJson()->post(config('app.api_endpoint'), [
            'query' => File::get(resource_path('graphql/getPost.graphql')),
            'variables' => [
                'uri' => $this->uri,
            ]
        ]);

        return new Post($response->json('data.nodeByUri'));
    }
};
?>

<div>
    @php
        $post = $this->getBlog();
    @endphp
    <div class="max-w-5xl mx-auto px-4">
        <img class="w-full max-w-3xl mx-auto" src="{{ $post->featuredImage->getUrl('large') }}" alt="{{ $post->featuredImage->altText }}" />
        <h2 class="text-3xl mt-16 mb-4">{{ $post->title }}</h2>
        <p class="mb-4">{{ $post->date->format('F d, Y') }}</p>
        <div class="prose-lg mb-32 mx-auto">
            {!! $post->body !!}
        </div>
    </div>
</div>