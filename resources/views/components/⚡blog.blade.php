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
    <div class="max-w-5xl mb-32  mx-auto px-4">
        <img class="w-full max-w-3xl mx-auto" src="{{ $post->featuredImage->getUrl('large') }}" alt="{{ $post->featuredImage->altText }}" />
        <h2 class="text-3xl mt-16 mb-4">{{ $post->title }}</h2>
        <p class="mb-4">{{ $post->date->format('F d, Y') }}</p>
        <div class="prose-lg mx-auto">
            {!! $post->body !!}
        </div>

        <div class="w-max mx-auto">
            <h3 class="text-2xl mt-16 mb-8">Comments</h3>
            <div>
                @foreach($post->comments as $comment)
                    <x-comment :$comment />
                    {{-- <div>
                        <b>{!! $comment->author->name !!}</b>
                        <div class="prose">
                            {!! $comment->content !!}
                        </div>
                        @foreach($comment->comments as $comment)
                            <div class="ml-8">
                                <b>{!! $comment->author->name !!}</b>
                                <div class="prose">
                                    {!! $comment->content !!}
                                </div>
                            </div>
                        @endforeach
                    </div> --}}
                @endforeach
                </div>
            </div>
        </div>
</div>