<?php

use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Computed;
use Livewire\Component;
use App\DTO\Post;

new class extends Component
{
    #[Computed]
    public function getBlogs() {
        $response = Http::asJson()->post(config('app.api_endpoint'), [
            'query' => File::get(resource_path('graphql/getPosts.graphql')),
            'variables' => [
                'first' => 5
            ]
        ]);

        return collect($response->json('data.posts.nodes'))
            ->mapInto(Post::class);
    }
};
?>

<div class="space-y-8 max-w-5xl mx-auto my-8">
    @foreach ($this->getBlogs as $post)
        <div class="grid grid-cols-1 sm:grid-cols-[300px_1fr] gap-8 px-4 place-items-center">
            <img src="{{ $post->featuredImage->getUrl('large') }}" alt="{{ $post->featuredImage->altText }}" />
            <div>
                <h3 class="text-2xl mb-3"><a href="{{ route('post.uri', ['uri' => $post->uri]) }}" wire:navigate.hover>{{ $post->title }}</a></h3>
                {!! $post->body !!}
            </div>
        </div>
    @endforeach
</div>