<?php

use Livewire\Component;
use App\DTO\Post;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Computed;

new class extends Component
{
    public ?array $recentPosts = [];

    public function mount()
    {
        $this->loadRecent();
    }

    public function loadRecent()
    {
        $response = Http::asJson()->post(config('app.api_endpoint'), [
            'query' => File::get(resource_path('graphql/getPosts.graphql')),
            'variables' => [
                'first' => 4,
            ]
        ]);

        $this->recentPosts = $response->json('data.posts.nodes');
    }

    #[Computed]
    public function posts() {
        // Map to DTOs only when accessed
        return collect($this->recentPosts)->mapInto(Post::class);
    }
};
?>

<div class="px-8 py-16 bg-green-very-dark">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-serif text-center mb-16"><span class="px-8 py-4 bg-gray-800 text-white">Recent Articles</span></h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 lg:grid-cols-4">
            @foreach($this->posts() as $post)
                <div class="bg-white isolate relative group">
                    <a class="" href="{{ $post->uri }}">
                        <div class="opacity-0 group-hover:opacity-100 transition-all duration-300 absolute z-10 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-12">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                            </svg>
                        </div>
                        <div class="aspect-square bg-gray-800"><img class="w-full h-full object-cover group-hover:opacity-60" src="{{ $post->featuredImage?->getUrl('large') }}" alt="{{ $post->featuredImage?->altText }}" /></div>
                        <div class="p-4">
                            <h3 class="text-lg sm:text-xl sm:text-center mb-4 line-clamp-1">{{ $post->title }}</h3>
                            <div class="text-md line-clamp-2">{!! $post->body !!}</div>
                            <a class="font-bold mt-2" href="{{ $post->uri }}">Read More</a>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>